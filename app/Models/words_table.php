<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class words_table extends Model
{
    use HasFactory;
    protected $table = 'words_tables';
    protected $fillable = [
        
    'word_id',	
    'word',	
    'sound',	
    'as_soundex',	
    'image',	
    'explanation',	
    'english',	
    'transliterate',	
    'keywords'	

];
}
