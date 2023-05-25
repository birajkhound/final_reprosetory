<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class synonyms_table extends Model
{
    use HasFactory;
    protected $table = 'synonyms_tables';
    protected $fillable = [
        
    's_id',	
    'word',	
    'synonym'
    
];
}
