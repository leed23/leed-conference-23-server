<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Sessions;
use App\Models\ChildSessions;
use App\Models\Facilitators;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;


use Illuminate\Http\Request;

class Session extends Controller
{

   public function index(Request $request) {

      $filter = QueryBuilder::for(Sessions::class)
         ->with('childsessions')
         ->AllowedFilters([
            AllowedFilter::exact('childsessions', 'childsessions.*'),
            AllowedFilter::exact('session_format'),
            AllowedFilter::scope('time_range')
         ])
         ->orderBy('start_time')
         ->get();

      return $filter;
   }

   public function show($id) {
      return Sessions::where('slug', $id)->first();
   }

   public function search($id) {
      return Search::add(Sessions::with('facilitators'), ['title', 'full_name','facilitators.name'])
      ->beginWithWildcard()
      ->orderBy('sessions.start_time')
      ->get($id);
   }
}
