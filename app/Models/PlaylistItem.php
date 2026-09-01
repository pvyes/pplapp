<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['item_id', 'position', 'playlist_id'])]
class PlaylistItem extends Model
{
     public function playlist(): BelongsTo
  {
      return $this->belongsTo(Playlist::class);
  }
}
