<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Modules\Payment\Entities\Checkout;
use Modules\CourseSetting\Entities\CourseEnrolled;

class EnrollInvoicePageSection extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $enroll = CourseEnrolled::where('id', $this->id);

        // $enroll = Checkout::where('id', $this->id);
       $enroll = $enroll->with('course', 'user', 'course.user')->first();

        if (!$enroll) {
            abort(404);
        }
        return view(theme('components.enroll-invoice-page-section'), compact('enroll'));
    }
}
