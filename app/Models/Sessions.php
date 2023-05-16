<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;



class Sessions extends Model
{
    use HasFactory;


    public function scopeStartTime(Builder $query, $date): Builder {
    return $query->where('start_time', '>=', Carbon::parse($date));
    }

    public function themes(): HasMany {
        return $this->hasMany(Themes::class);
    }
}
