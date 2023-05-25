<?php

namespace App\Http\Controllers\Admin_Functionality;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Words_Table_Update_Controller extends Controller
{
    public function view_words(){
        return view('admin_functionality.UpdateWord');
    }
    public function displayWords(Request $r){
        $validator = Validator::make($r->all(), [
            'word_val' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        else{
        $word_val = $r->word_val;
        $words = DB::select("SELECT word,word_id FROM words_tables where word = '$word_val' OR  word LIKE '$word_val%'
        or translate = '$word_val' or translate LIKE '$word_val%';");
        if(!empty($words)){
            return response()->json(['words'=>$words],200);
        }else{
            return response()->json(['words'=>"শব্দ পোৱা নগ'ল |"],400);
        }
        
    }
    }

    public function getDetails(Request $r){
        $id = $r->id;
        $wordUp = DB::table('words_tables')->where('word_id', $id)->first();
        return response()->json(['wordUp'=>$wordUp],200);
    }

    public function viewDetails(){
        return view('admin_functionality.submitUpdates');
    }
 
public function submitUpdate(Request $r){
    $validator = Validator::make($r->all(), [
        'word' => 'required|string',
        'explanation' => 'required|string',
        'translate' => 'required|string',
        'keyword' => 'required|string',
        'english' => 'required|string',
        'audio' =>'nullable|max:102400',
        'image' =>'nullable|image|mimes:jpeg,png,jpg|max:102400',
    ]);       
    if($validator->fails()){
        return response()->json(['validation_fail' => $validator->errors()], 400);
    }
    else{
        try {
            $id = $r->word_id;
            $word = $r->word;
            $assamese_soundex = assamese_soundex($word);
            $explanation = $r->explanation;
            $translate = $r->translate;
            $keyword = $r->keyword;
            $english = $r->english;
            $audio = $r->audio;
            $image = $r->image;
            if(!empty($image) && !empty($audio)){
                    if($audio->getClientOriginalExtension() != 'mp3'){
                   $audio_error = array("audio" => array("audio should be mp3"));
                   return response()->json(['validation_fail' => $audio_error], 400);
                  }else{
                    if(!empty($r->old_image)){
                    unlink(public_path('uploads\images\\'.$r->old_image));
                }
                    $image_name = $translate.'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/images',$image_name);
                     if(!empty($r->old_audio)){
                     unlink(public_path('uploads\audios\\'.$r->old_audio));
                }
                    $sound_name = $translate.'.'.$audio->getClientOriginalExtension();
                    $audio->move('uploads/audios',$sound_name);

                    $wordUpdate = DB::update("UPDATE `words_tables` SET `word`='$word',`explanation`='$explanation',`english`='$english',`translate`='$translate',`keywords`='$keyword',`sound`='$sound_name',`as_soundex`='$assamese_soundex',`image`='$image_name' WHERE `word_id`='$id'");
                    return response()->json(['updated' => "অডিঅ' আৰু ছবিৰ সৈতে তথ্য সফলভাৱে আপডেইট কৰা হৈছে।"], 200);
                  }
               }
                elseif(empty($image) && !empty($audio)){
                        if($audio->getClientOriginalExtension() != 'mp3'){
                       $audio_error = array("audio" => array("audio should be mp3"));
                       return response()->json(['validation_fail' => $audio_error], 400);
                      }
                      else{
                        if(!empty($r->old_audio)){
                           unlink(public_path('uploads\audios\\'.$r->old_audio));
                      }
                            $sound_name = $translate.'.'.$audio->getClientOriginalExtension();
                            $audio->move('uploads/audios',$sound_name);
                            $wordUpdate = DB::update("UPDATE `words_tables` SET `word`='$word',`explanation`='$explanation',`english`='$english',`translate`='$translate',`keywords`='$keyword',`sound`='$sound_name',`as_soundex`='$assamese_soundex' WHERE `word_id`='$id'");
                        return response()->json(['updated' => "অডিঅ'ৰ সৈতে তথ্য সফলভাৱে আপডেইট কৰা হৈছে।"], 200);
                      }
                   }
                    
                elseif(!empty($image) && empty($audio)){
                    if(!empty($r->old_image)){
                     unlink(public_path('uploads\images\\'.$r->old_image));
                 }
                        $image_name = $translate.'.'.$image->getClientOriginalExtension();
                        $image->move('uploads/images',$image_name);
                        $wordUpdate = DB::update("UPDATE `words_tables` SET `word`='$word',`explanation`='$explanation',`english`='$english',`translate`='$translate',`keywords`='$keyword',`as_soundex`='$assamese_soundex',`image`='$image_name' WHERE `word_id`='$id'");
                    return response()->json(['updated' => 'ছবিৰ সৈতে তথ্য সফলতাৰে আপডেইট কৰা হৈছে।'], 200);
                }
                elseif(empty($image) && empty($audio)){
                $wordUpdate = DB::update("UPDATE `words_tables` SET `word`='$word',`explanation`='$explanation',`english`='$english',`translate`='$translate',`as_soundex`='$assamese_soundex',`keywords`='$keyword' WHERE `word_id`='$id'");
                return response()->json(['updated' => "তথ্য সফলতাৰে আপডেট কৰা হৈছে |"], 200);
                }
         }
        catch (\Exception $e) {
            return response()->json(['updated' => $e->getMessage()],400);
        }
    }
 }
}
