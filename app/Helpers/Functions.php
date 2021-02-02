<?php

namespace App\Helpers;


class Functions{

      function formatPriceToDatabase($price)
      {
            return str_replace(['.', ','], ['', '.'], $price);
      }

}