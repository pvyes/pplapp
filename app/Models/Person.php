<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[fillable(['documentId', 'firstname', 'middlename', 'lastname', 'date_of_birth', 'date_of_death', 'country', 'bio', 'readable_name', 'publishedAt'])]
#[casts(['date_of_birth' => 'date', 'date_of_death' => 'date', 'publishedAt' => 'datetime'])]
class Person extends Model
{
    public function artists()
    {
        return $this->hasMany(Artist::class);
    }
}