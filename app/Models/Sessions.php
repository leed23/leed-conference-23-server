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
        return $query->where('start_time', '>=', Carbon::parse($startTime))
        ->where('end_time', '>=', Carbon::parse($startTime));
    }

    public function themes(): HasMany {
        return $this->hasMany(Themes::class)->orderBy('theme', 'asc');
    }

    public function childsessions(): HasMany {
        return $this->hasMany(ChildSessions::class)->orderBy('title', 'asc');
    }

    public function scopeChildsessionFilter($query, $value)
{
    return $query->whereHas('childsessions', function ($query) use ($value) {
        // Apply your filtering conditions for childsessions here
        $query->where('some_column', $value);
    });
}
        
}