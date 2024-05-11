<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AboutPageStudentsWork extends Component
{
    //public $frontendContent;

    public function __construct()
    {
        //$this->frontendContent = $frontendContent;
    }

    public function render()
    {
        return view(theme('components.about-page-students-work'));
    }
}
