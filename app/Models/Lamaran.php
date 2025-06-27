<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lamaran extends Model
{
    protected $fillable = ['user_id', 'vacancy_id', 'status'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function vacancy(): BelongsTo {
        return $this->belongsTo(Vacancy::class);
    }
}

