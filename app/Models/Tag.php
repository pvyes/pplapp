<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[fillable(['documentId', 'tagname', 'publishedAt'])]
#[casts(['publishedAt' => 'datetime'])]
class Tag extends Model
{
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
