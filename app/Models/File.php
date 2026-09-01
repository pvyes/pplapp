<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[fillable(['documentId', 'name', 'alternativeText', 'caption', 'focalPoint', 'width', 'height', 'formats', 'hash', 'ext', 'mime', 'size', 'url', 'previewUrl', 'provider', 'provider_metadata', 'publishedAt'])]
#[casts(['publishedAt' => 'datetime'])]
class File extends Model
{

}