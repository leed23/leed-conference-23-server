<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
use Carbon\Carbon;


class Sessions extends Model

{
    use HasFactory;

    public function scopeTimeRange(Builder $query, $startTime, $endTime): Builder {
        return $query->where('start_time', '<=', Carbon::parse($endTime))
        ->where('end_time', '<=', Carbon::parse($endTime));
    }

    public function themes(): HasMany {
        return $this->hasMany(Themes::class);
    }

    public function childsessions(): HasMany {
        return $this->hasMany(ChildSessions::class);
    }
        
}