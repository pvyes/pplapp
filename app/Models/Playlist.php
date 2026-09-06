<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'description', 'visibility'])]
class Playlist extends Model
{
    public function playlistItems(): HasMany
    {
        return $this->hasMany(PlaylistItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
