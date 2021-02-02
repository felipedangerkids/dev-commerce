<?php

namespace App\Helpers;

use App\Models\Category;



class HelperClass
{
      public static function categories()
      {
            return Category::whereNull('parent_id')->with('childrenCategories')->get();
      }

      public static function categorie($response)
      {
            return Category::where($response)->first();
      }
}

// if(! function_exists('oi')){
//     function oi()
//     {
//         return 'oi';
//     }
// }