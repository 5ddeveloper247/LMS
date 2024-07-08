<?php

namespace App\View\Components;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\FooterSetting\Entities\FooterSetting;
use Modules\FooterSetting\Entities\FooterWidget;

class FooterSectionTwoWidget extends Component
{


    public function render()
    {
        $sectionWidget = FooterWidget::where('status', 1)->where('section', '2')
        ->with('frontpage')->orderBy('pos','DESC')
        ->get();

        return view(theme('components.footer-section-two-widget'), compact('sectionWidget'));
    }
}
