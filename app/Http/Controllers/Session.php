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
         ->with('childsessions', 'childsessions.themes', 'childsessions.facilitators')
         ->allowedIncludes(['childsessions.themes', 'childsessions.facilitators'])
         ->AllowedFilters([
            AllowedFilter::exact('session_type', 'childsessions.session_type'),
            AllowedFilter::exact('themes', 'childsessions.themes.theme'),
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
      return Search::add(Sessions::with('childsessions', 'childsessions.themes', 'childsessions.facilitators'), ['childsessions.title', 'childsessions.full_name','childsessions.facilitators.name'])
      ->beginWithWildcard()
      ->orderBy('sessions.start_time')
      ->get($id);
   }
}
