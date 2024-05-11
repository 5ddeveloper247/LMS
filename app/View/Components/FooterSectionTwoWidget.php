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
        $sectionWidgetsData = Cache::rememberForever('sectionWidgets_' . app()->getLocale() . SaasDomain(), function () {
            return FooterWidget::where('status', 1)
                ->with('frontpage')
                ->get();
        });

      //  $sectionWidget = $sectionWidgetsData->where('section', '1');
        $sectionWidget = $sectionWidgetsData->where('section', '2');

        return view(theme('components.footer-section-two-widget'), compact('sectionWidget'));
    }
}
