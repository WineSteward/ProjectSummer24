<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'job_listings';

    

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id'); //fix para indicar qual a coluna que deve procurar
        //por default seria job_id mas como classe Job ja existia antes tivemos de usar job_listing para a table entao o ID sera job_listing_id
    }
}
