<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[fillable(['documentId', 'item_id', 'person_id', 'artist_function_id', 'readable_artist', 'publishedAt'])]
#[casts(['publishedAt' => 'datetime'])]
class Artist extends Model
{
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function artistFunction(): BelongsTo
    {
        return $this->belongsTo(ArtistFunction::class, 'artist_function_id');
    }
}