<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Carbon\Carbon;


class Sessions extends Model

{
    use HasFactory;

    use Searchable;

    public function toSearchableArray() {
        return [
            'title' => $this->title,
        ];
    }

    public function scopeTimeRange(Builder $query, $startTime, $endTime): Builder {
        return $query->where('start_time', '<=', Carbon::parse($endTime))
        ->where('end_time', '>=', Carbon::parse($startTime));
    }

    public function themes(): HasMany {
        return $this->hasMany(Themes::class);
    }
}
