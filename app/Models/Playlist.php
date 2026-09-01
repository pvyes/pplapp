<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'description'])]
class Playlist extends Model
{
    public function playlistItems(): HasMany
    {
        return $this->hasMany(PlaylistItem::class);
    }

}
