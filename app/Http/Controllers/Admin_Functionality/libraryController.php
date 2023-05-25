<?php

namespace App\Http\Controllers\Admin_Functionality;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\DB;

class libraryController extends Controller
{
    public function view(){
        return view('admin_functionality.library');
    }

    public function wordSearch(Request $r){
        $validator = Validator::make($r->all(), [
            'word_val' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        else{
        $word_val = $r->word_val;
        $words = DB::select("SELECT words_tables.*, GROUP_CONCAT(DISTINCT  (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = synonyms_tables.synonym) SEPARATOR ',') as synonyms, GROUP_CONCAT(DISTINCT (SELECT words_tables.word FROM words_tables WHERE words_tables.word_id = antonyms_tables.antonym) SEPARATOR ',') as antonyms FROM `words_tables` LEFT JOIN `synonyms_tables` ON words_tables.word_id = synonyms_tables.word LEFT JOIN `antonyms_tables` ON words_tables.word_id = antonyms_tables.word WHERE words_tables.word = '$word_val' OR  words_tables.word LIKE '$word_val%' OR  words_tables.translate = '$word_val' OR  words_tables.translate LIKE '$word_val%'  GROUP BY(words_tables.word_id);");
        if(!empty($words)){
            return response()->json(['words'=>$words],200);
        }else{
            return response()->json(['words'=>"শব্দ পোৱা নগ'ল |"],400);
        }
        
    }

    }
}
