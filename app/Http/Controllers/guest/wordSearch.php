<?php

namespace App\Http\Controllers\guest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;

class wordSearch extends Controller
{
public function search(Request $r){    
    $validator = Validator::make($r->all(), [
        'word_val' => 'required|max:50',
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    else{
        try{
    $word_val = $r->word_val;
    $words = DB::select("SELECT words_tables.*, GROUP_CONCAT(DISTINCT  (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = synonyms_tables.synonym) SEPARATOR ',') as synonyms, GROUP_CONCAT(DISTINCT (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = antonyms_tables.antonym) SEPARATOR ',') as antonyms FROM `words_tables` LEFT JOIN `synonyms_tables` ON words_tables.word_id = synonyms_tables.word LEFT JOIN `antonyms_tables` ON words_tables.word_id = antonyms_tables.word WHERE words_tables.word = '$word_val' OR  words_tables.translate = '$word_val' GROUP BY(words_tables.word_id);");
    if(!empty($words)){
        return response()->json(['words'=>$words],200);
    }else{
        $as_soundex = assamese_soundex($word_val);
        if(!empty($as_soundex)){
        // $data_soundex = DB::select("SELECT words_tables.word FROM words_tables WHERE words_tables.as_soundex = '$as_soundex' order by LOCATE('$as_soundex', word);");
        $data_soundex = DB::select("SELECT words_tables.*, GROUP_CONCAT(DISTINCT  (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = synonyms_tables.synonym) SEPARATOR ',') as synonyms, GROUP_CONCAT(DISTINCT (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = antonyms_tables.antonym) SEPARATOR ',') as antonyms FROM `words_tables` LEFT JOIN `synonyms_tables` ON words_tables.word_id = synonyms_tables.word LEFT JOIN `antonyms_tables` ON words_tables.word_id = antonyms_tables.word WHERE words_tables.as_soundex = '$as_soundex' GROUP BY(words_tables.word_id);");
        }

        $data_spell_like =  DB::select("SELECT words_tables.word FROM words_tables WHERE words_tables.WORD LIKE '$word_val%' or words_tables.translate LIKE '$word_val%'order by word LIMIT 3;");
               if(!empty($data_soundex)){
                return response()->json(['words'=>$data_soundex],200);
                }
                elseif(empty($data_soundex) && !empty($data_spell_like)){
                return response()->json(['words'=>$data_spell_like],201);
                }
                else{  
                return response()->json(['words'=>"শব্দ পোৱা নগ'ল |"],400);
                } 
}} catch (\Exception $e) {
    return response()->json(['words' => $e->getMessage()],400);
}
}
}
 public function predict(Request $r){
    $validator = Validator::make($r->all(), [
        'word_val' => 'required|max:50',
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    else{
        try{
            $word = $r->word_val;
            $quary = DB::select("SELECT word FROM words_tables where word = '$word' OR word LIKE '$word%' OR translate = '$word'OR translate LIKE '$word%' order by word LIMIT 5;");
            if(!empty($quary)){
                return response()->json(['word_checked' => $quary], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['word_checked' => $e->getMessage()],400);
        }

    }
 }
} 
     