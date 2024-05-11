<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Entities\BlogCategory;

class BlogTagsWidget extends Component
{


    public function render()
    {
      $tags = Blog::where('status', 1)->pluck('tags')->toArray(); // Assuming 'tags' is the column name

      $tagsArray = [];

      foreach ($tags as $tagString) {
        $tagsArray = array_merge($tagsArray, explode(',', trim($tagString)));
      }
      $tagsArray = array_unique($tagsArray);
        return view(theme('components.blog-tags-widget'), compact('tagsArray'));
    }
}
