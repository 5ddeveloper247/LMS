<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendGeneralEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\StudentSetting\Entities\TutorReveiws;
use Modules\SystemSetting\Entities\TutorHiring;


class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function myTutors(Request $request)
    {
        try {
            $tutors = TutorHiring::where('user_id', Auth::id())->orderBy('assign_date', 'DESC')->with('instructor', 'course', 'tutorReviewRating')->paginate(9);
            // dd($tutors[0]->id/);
            return view(theme('pages.myTutors'), compact('tutors'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
    public function cancelRequest(Request $request, $id){
        

        $record=TutorHiring::find($id);
        
        $record->cancel_request='1';
        $record->save();
        return redirect()->back();
    }

    public function tutorReview(Request $request)
    {
        $request->validate([
            'reviews' => 'required|min:5',
            'rating' => 'required|integer',
        ]);

        $tutor_review = new TutorReveiws();
        $tutor_review->user_id = Auth::id();
        $tutor_review->status = 1;
        $tutor_review->comment = $request->reviews;
        $tutor_review->star = $request->rating;
        $tutor_review->instructor_id = $request->instructor_id;
        $tutor_review->hiring_id = $request->hiring_id;
        $tutor_review->lms_id = null;
        $tutor_review->save();
        if ($tutor_review) {

            SendGeneralEmail::dispatch(User::find($request->instructor_id), 'Tutor_Review', [
                'time' => Carbon::now()->format('d-M-Y, g:i A'),
                'username' => Auth::user()->name,
                'review' => $tutor_review->comment,
                'star' => $tutor_review->star,
            ]);

//                send_browser_notification(
//                    $course->user,
//                    'Course_Review',
//                    [
//                        'time' => Carbon::now()->format('d-M-Y, g:i A'),
//                        'course' => $course->title,
//                        'review' => $newReview->comment,
//                        'star' => $newReview->star,
//                    ],
//                    trans('common.View'),
//                    courseDetailsUrl(@$course->id, @$course->type, @$course->slug),
//                );


            return response()->json([
                'status' => 200,
                'message' => 'Thank You For Review!'
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'Something Went Wrong!'
            ]);
        }
    }
}
