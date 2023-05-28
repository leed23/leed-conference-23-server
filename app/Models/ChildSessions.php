<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ChildSessions extends Model
{
    use HasFactory;

    public function themes(): HasMany {
        return $this->hasMany(Themes::class);
    }

    public function facilitators(): BelongsToMany {
        return $this->belongsToMany(Facilitators::class, 'sessions_facilitators');
    }
}
