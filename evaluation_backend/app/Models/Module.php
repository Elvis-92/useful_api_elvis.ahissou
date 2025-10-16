<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
     protected $fillable = [
        'name',
        'description',
    ];

    // public function user(): BelongsTo {
    //     return $this->belongsTo(User::class);
    // }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
