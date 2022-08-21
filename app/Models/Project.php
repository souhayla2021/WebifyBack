<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";

    protected $fillable = [
      'titre',
      'categorie',
      'created_at'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'foreign_key','owner_key');
    }
 
}