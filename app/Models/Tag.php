<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");//fix para indicar qual a coluna que deve procurar
        //por default seria job_id mas como classe Job ja existia antes tivemos de usar job_listing para a table entao o ID sera job_listing_id
    }
}
