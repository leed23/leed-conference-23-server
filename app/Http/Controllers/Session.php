<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use App\Models\Sessions;
use App\Models\Facilitators;

use Illuminate\Http\Request;

class Session extends Controller
{

   public function index(Request $request) {

      $filter = QueryBuilder::for(Sessions::class)
         ->with('themes', 'facilitators')
         ->AllowedFilters([
            AllowedFilter::exact('themes', 'themes.theme'),
            AllowedFilter::exact('facilitators', 'facilitators.name'),
            AllowedFilter::exact('session_format'),
            AllowedFilter::scope('time_range'),
         ])
         ->orderBy('start_time')
         ->get();

      return $filter;
   }

   public function show($id) {
      return Sessions::where('slug', $id)->first();
   }

   public function search($id) {
      $sessionSearch = Sessions::search($id)->get();
      
      return $sessionSearch;
  }

}
