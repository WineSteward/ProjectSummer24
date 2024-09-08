<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'job_listings'; //definir que o nome na Base de dados chama se job listing e nao o nome da classe

    protected $guarded = [];    

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listing_id'); //fix para indicar qual a coluna que deve procurar
        //por default seria job_id mas como classe Job ja existe no laravel
        //tivemos de usar job_listing para a table entao o ID sera job_listing_id
    }
}
