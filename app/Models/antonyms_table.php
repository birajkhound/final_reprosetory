<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antonyms_table extends Model
{
    use HasFactory;
    protected $table = 'antonyms_tables';
    protected $fillable = [
        
    'ant_id',	
    'word',	
    'antonym'
    
];
}
