<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;

class BlogCategoryWidget extends Component
{


    public function render()
    {
        $categories = BlogCategory::where('status', 1)->get();
        return view(theme('components.blog-category-widget'), compact('categories'));
    }
}
