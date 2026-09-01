<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[fillable(['documentId', 'artistfunction', 'publishedAt'])]
#[casts(['publishedAt' => 'datetime'])]
class ArtistFunction extends Model
{
    

}