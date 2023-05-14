<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Sessions;

use Illuminate\Http\Request;

class Session extends Controller
{

   public function index() {

      $filter = QueryBuilder::for(Sessions::class)
         ->with('themes')
         ->AllowedFilters([
            AllowedFilter::exact('themes', 'themes.theme'),
            AllowedFilter::exact('session_format'),
         ])
         ->get();

      return $filter;
   }


   public function show($id) {
      return Sessions::where('slug', $id)->first();
   }

}
