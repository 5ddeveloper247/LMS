<?php

namespace App\View\Components;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;
use Modules\FooterSetting\Entities\FooterSetting;
use Modules\FooterSetting\Entities\FooterWidget;

class FooterSectionOneWidget extends Component
{


    public function render()
    {
        
        $sectionWidget = FooterWidget::where('status', 1)->where('section', '1')
        ->with('frontpage')
        ->get();

        return view(theme('components.footer-section-one-widget'), compact('sectionWidget'));
    }
}
