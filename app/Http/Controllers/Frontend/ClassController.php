<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\BBB\Entities\BbbMeeting;
use Modules\Certificate\Entities\CertificateRecord;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseComment;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\Jitsi\Entities\JitsiMeeting;
use Modules\VirtualClass\Entities\ClassComplete;
use Modules\Zoom\Entities\ZoomMeeting;
use Modules\Team\Entities\TeamMeeting;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function classes(Request $request)
    {
        try {
            if (hasDynamicPage()) {
                $row = FrontPage::where('slug', '/classes')->first();
                $details = dynamicContentAppend($row->details);
                return view('aorapagebuilder::pages.show', compact('row', 'details'));
            } else {
                return view(theme('pages.classes'), compact('request'));
            }

        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function classDetails($slug, Request $request)
    {

        try {

            if($request->has('program_id')){
                $isEnrolled = CourseEnrolled::where('program_id', $request->program_id)->where('user_id', Auth::id())->count();
                if ($isEnrolled == 0) {
                    Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
                    return redirect()->back();
                }
            }else if($request->has('courseType')){
                $isEnrolled = CourseEnrolled::where('course_id', $request->course_id)->where('course_type', $request->courseType)->where('user_id', Auth::id())->count();
                if ($isEnrolled == 0) {
                    Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
                    return redirect()->back();
                }
            }else{
                Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
                return redirect()->back();
            }

            $course = Course::with('user', 'enrolls', 'reviews', 'comments', 'virtualClass', 'activeReviews', 'enrollUsers')->where('slug', $slug)->first();

            // dd($course);
            if (!$course) {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }


//            if (!isViewable($course)) {
//                Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
//                return redirect()->back();
//            }


            $comments = CourseComment::where('course_id', $course->id)->with('replies', 'replies.user', 'user')->paginate(10);

            $data = '';
            if ($request->ajax()) {
                if ($request->type == "comment") {
                    foreach ($comments as $comment) {
                        $data .= view(theme('partials._single_comment'), ['comment' => $comment, 'isEnrolled' => $isEnrolled, 'course' => $course])->render();
                    }
                    return $data;
                }

            }

            $reviews = DB::table('course_reveiws')
                ->select(
                    'course_reveiws.id',
                    'course_reveiws.star',
                    'course_reveiws.comment',
                    'course_reveiws.instructor_id',
                    'course_reveiws.created_at',
                    'users.id as userId',
                    'users.name as userName',
                )
                ->join('users', 'users.id', '=', 'course_reveiws.user_id')
                ->where('course_reveiws.course_id', $course->id)->paginate(10);

            $data = '';
            if ($request->ajax()) {
                if ($request->type == "review") {
                    foreach ($reviews as $review) {
                        $data .= view(theme('partials._single_review'), ['review' => $review, 'isEnrolled' => true, 'course' => $course])->render();
                    }
                    if (count($reviews) == 0) {
                        $data .= '';
                    }
                    return $data;
                }
            }
            $course->view = $course->view + 1;
            $course->save();

            return view(theme('pages.class_details'), compact('request', 'course'));

        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function classStart($slug, $host, $meeting_id)
    {

        try {

            $course = Course::with('user', 'enrolls', 'reviews', 'comments', 'virtualClass', 'activeReviews', 'enrollUsers')->where('slug', $slug)->first();
            if (!$course) {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }

            if (!isViewable($course)) {
                Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
                return redirect()->to(route('classes'));
            }


//            if (!Auth::check()) {
//                Toastr::error('You are not enrolled for this course !', 'Failed');
//                return redirect()->back();
//            } else {
//                if (!$course->isLoginUserEnrolled) {
//                    Toastr::error('You are not enrolled for this course !', 'Failed');
//                    return redirect()->back();
//                }
//            }

            $classComplete = ClassComplete::where('course_id', $course->id)
                ->where('class_id', $course->class_id)
                ->where('host', $host)
                ->where('meeting_id', $meeting_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            if (!$classComplete) {
                $classComplete = new ClassComplete();
                $classComplete->course_id = $course->id;
                $classComplete->class_id = $course->class_id;
                $classComplete->host = $host;
                $classComplete->meeting_id = $meeting_id;
                $classComplete->user_id = Auth::user()->id;
                $classComplete->status = 1;
            }
            $classComplete->save();


            $websiteController = new WebsiteController();
            $websiteController->getCertificateRecord($course->id);

            if ($host == "Zoom") {
                $meeting = ZoomMeeting::find($meeting_id);
                if ($meeting) {
                    return redirect(route('zoom.meeting.join', $meeting->meeting_id));
                }
            }
            elseif ($host == "Team") {
                $meeting = TeamMeeting::find($meeting_id);
                if ($meeting) {
                    return redirect(route('team.meeting.join', $meeting->meeting_id));
                }
            }
            elseif ($host == "BBB") {
                $meeting = BbbMeeting::find($meeting_id);
                if ($meeting) {
                    return redirect(url('bbb/meeting-start-attendee/' . $course->id . '/' . $meeting->meeting_id));
                }
            } elseif ($host == "Jitsi") {
                $meeting = JitsiMeeting::find($meeting_id);
                if ($meeting) {
                    return redirect(url('jitsi/meeting-start/' . $course->id . '/' . $meeting->meeting_id));
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}
