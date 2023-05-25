<?php

namespace App\Http\Controllers\Admin_Functionality;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
use App\Models\synonyms_table;
use App\Models\antonyms_table;

class ControllerForAntonymsANdSynonyms extends Controller
{
    public function findDetails(Request $r){
        $id = $r->id;
        $this_word = DB::select("SELECT word FROM words_tables where word_id = '$id'");
        return response()->json(['this_word'=>$this_word],200);
    }

    public function view(){
        return view('admin_functionality.addAntonyms&Synonim');
    }

    public function insertSynonyms(Request $r){
        $validator = Validator::make($r->all(), [
            'word' => 'required',
            'synonyms' => 'required',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try {    
                $word = $r->word;
                $synonyms = $r->synonyms;
                $b = json_decode($synonyms);
                $i = count($b);
                $count = 0;
                for($j = 0; $j<$i;$j++){
                    $find = DB::select("SELECT * FROM `synonyms_tables` WHERE `word` = '$word' AND `synonym` = '$b[$j]'");
                    if(!empty($find)){
                        $count = $count + 1;
                    }else{
                        $synonyms_table_model = new synonyms_table();
                        $synonyms_table_model->word = $word;
                        $synonyms_table_model->synonym = $b[$j];
                        $synonyms_table_model->save();
                    }
                }
                
                if($count == 0){
                    return response()->json(['sy_Inserted' =>" ডাটাবেছত $i টা প্ৰতিশব্দ সফলতাৰে যোগ কৰা হৈছে।"],200);
                }else{
                    $m = $i-$count ;
                    return response()->json(['sy_Inserted' =>"$count টা শব্দ ইতিমধ্যে ডাটাবেছত আছে বাকী থকা $m টা শব্দ ডাটাবেছত সফলতাৰে যোগ কৰা হৈছে।"],200);
                }
                
            }catch (\Exception $e) {
                return response()->json(['sy_Inserted_error' => $e->getMessage()],400);
            }
        }

    }
    public function synonymsChechAvailability(Request $r){
        $validator = Validator::make($r->all(), [
            'word_id' => 'required',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try { 
                $id = $r->word_id;
                $synonyms_data = DB::select("SELECT words_tables.word,words_tables.word_id FROM `words_tables` LEFT JOIN `synonyms_tables` ON words_tables.word_id = synonyms_tables.synonym WHERE synonyms_tables.word = $id");
               if(!empty($synonyms_data)){
                 return response()->json(['sy_available' => $synonyms_data],200);
               }
             }catch (\Exception $e) {
                return response()->json(['sy_available' => $e->getMessage()],400);
            } 
        }
    }
    public function deleteSynonym(Request $r){
        $validator = Validator::make($r->all(), [
            'word' => 'required',
            'synonym' => 'required'
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try {  
                $word = $r->word;
                $synonym = $r->synonym;
            $delete = DB::delete("DELETE FROM `synonyms_tables` WHERE `word` = $word AND `synonym` = $synonym");
            return response()->json(['sy_deleted' => 'deleted'],200);
            }catch (\Exception $e) {
                return response()->json(['sy_deleted' => $e->getMessage()],400);
            }  

        }
    }

    public function insertAntonyms(Request $r){

        $validator = Validator::make($r->all(), [
            'word' => 'required',
            'antonyms' => 'required',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try {    
                $word = $r->word;
                $antonyms = $r->antonyms;
                $b = json_decode($antonyms);
                $i = count($b);
                $count = 0;
                for($j = 0; $j<$i;$j++){
                    $find = DB::select("SELECT * FROM `antonyms_tables` WHERE `word` = '$word' AND `antonym` = '$b[$j]'");
                    if(!empty($find)){
                        $count = $count + 1;
                    }else{
                        $antonyms_table_model = new antonyms_table();
                        $antonyms_table_model->word = $word;
                        $antonyms_table_model->antonym = $b[$j];
                        $antonyms_table_model->save();
                    }
                }
                
                if($count == 0){
                    return response()->json(['ant_Inserted' =>" ডাটাবেছত $i টা বিপৰীত শব্দ সফলতাৰে যোগ কৰা হৈছে।"],200);
                }else{
                    $m = $i-$count ;
                    return response()->json(['ant_Inserted' =>"$count টা শব্দ ইতিমধ্যে ডাটাবেছত আছে বাকী থকা $m টা শব্দ ডাটাবেছত সফলতাৰে যোগ কৰা হৈছে।"],200);
                }
                
            }catch (\Exception $e) {
                return response()->json(['ant_Inserted_error' => $e->getMessage()],400);
            }
        }
    }

    public function antonymsChechAvailability(Request $r){
        $validator = Validator::make($r->all(), [
            'word_id' => 'required',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try { 
                $id = $r->word_id;
                $antonyms_data = DB::select("SELECT words_tables.word,words_tables.word_id FROM `words_tables` LEFT JOIN `antonyms_tables` ON words_tables.word_id = antonyms_tables.antonym WHERE antonyms_tables.word = $id");
               if(!empty($antonyms_data)){
                 return response()->json(['ant_available' => $antonyms_data],200);
               }
             }catch (\Exception $e) {
                return response()->json(['ant_available' => $e->getMessage()],400);
            } 
        }

    }

    public function deleteAntonym(Request $r){
        $validator = Validator::make($r->all(), [
            'word' => 'required',
            'antonym' => 'required'
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try {  
                $word = $r->word;
                $antonym = $r->antonym;
            $delete = DB::delete("DELETE FROM `antonyms_tables` WHERE `word` = $word AND `antonym` = $antonym");
            return response()->json(['ant_deleted' => 'deleted'],200);
            }catch (\Exception $e) {
                return response()->json(['ant_deleted' => $e->getMessage()],400);
            }  

        }
    }
}
