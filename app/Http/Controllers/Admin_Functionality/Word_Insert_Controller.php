<?php

namespace App\Http\Controllers\Admin_Functionality;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\words_table;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\DB;

class Word_Insert_Controller extends Controller
{
 

    public function store(Request $req)
    {
        try {
            $data = $req->words;
            $b = json_decode($data);
            $a = gettype($b);
           $i = count($b);
          // $x = $b[0][0];
            for ($j = 0; $j < $i; $j++) {
                $words_table_model = new words_table();
                $words_table_model->word = $b[$j][0];
                $words_table_model->as_soundex =  assamese_soundex($b[$j][0]);
                $words_table_model->explanation = $b[$j][2];
                $words_table_model->english = $b[$j][3];
                $words_table_model->translate = $b[$j][1];
                $words_table_model->keywords = $b[$j][4];
                $words_table_model->save();
            };
            return response()->json(['Inserted' => "$i তা তথ্য সফলতাৰে সন্নিবিষ্ট কৰা হৈছে।"]);
        } catch (\Exception $e) {
            return response()->json(['Inserted' => $e->getMessage()]);
        }
    }
    public function availaBility(Request $r){
        $word = $r->word;
        $quary = DB::select("SELECT word FROM words_tables where word = '$word'");
        if(!empty($quary)){
            return response()->json(['word_checked' => "এই শব্দটো ইতিমধ্যে ডাটাবেছত উপলব্ধ।"], 200);
        }else{
            return response()->json(['word_checked' => "এই শব্দটো ডাটাবেছত সন্নিবিষ্ট কৰিব পাৰি।"], 400);
        }

    }
    public function storeForm(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'word' => 'required|string',
            'explanation' => 'required|string',
            'translate' => 'required|string',
            'keyword' => 'required|string',
            'english' => 'required|string',
            'audio' =>'required|max:102400',
            'image' =>'nullable|image|mimes:jpeg,png,jpg|max:102400',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }else if($r->audio->getClientOriginalExtension() != 'mp3'){
            $audio_error = array("audio" => array("audio should be mp3"));
            return response()->json(['validation_fail' => $audio_error], 400);
        }
        else{
            try {
                $word = $r->word;
                $explanation = $r->explanation;
                $translate = $r->translate;
                $keyword = $r->keyword;
                $english = $r->english;
                $audio = $r->audio;
                $image = $r->image;
                if(!empty($image)){
                    $image_name = $translate.'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/images',$image_name);
                    $sound_name = $translate.'.'.$audio->getClientOriginalExtension();
                    $audio->move('uploads/audios',$sound_name);
                    $words_table_model = new words_table();
                    $words_table_model->word = $word;
                    $words_table_model->explanation = $explanation;
                    $words_table_model->english = $english;
                    $words_table_model->translate = $translate;
                    $words_table_model->keywords = $keyword;
                    $words_table_model->sound = $sound_name;
                    $words_table_model->as_soundex =  assamese_soundex($word);
                    $words_table_model->image = $image_name;
                    $words_table_model->save();
                    return response()->json(['inserted' => 'শব্দটো ডাটাবেছত সফলতাৰে সন্নিবিষ্ট কৰা হৈছে।'], 200);}
                else{
                    $sound_name = $translate.'.'.$audio->getClientOriginalExtension();
                    $audio->move('uploads/audios',$sound_name);
                    $words_table_model = new words_table();
                    $words_table_model->word = $word;
                    $words_table_model->explanation = $explanation;
                    $words_table_model->english = $english;
                    $words_table_model->translate = $translate;
                    $words_table_model->keywords = $keyword;
                    $words_table_model->sound = $sound_name;
                    $words_table_model->as_soundex =  assamese_soundex($word);
                    $words_table_model->save();
                    return response()->json(['inserted' => 'শব্দটো ডাটাবেছত সফলতাৰে সন্নিবিষ্ট কৰা হৈছে।'], 200);}
            }
            catch (\Exception $e) {
                return response()->json(['Inserted' => $e->getMessage()],400);
            }
        }
    }
}
