<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Sessions;

use Illuminate\Http\Request;

class Session extends Controller
{
   public function index() {

   $filter = QueryBuilder::for(Sessions::class) 
      ->allowedFilters('title', 'name')
      ->get();

      return $filter;
   }
}
