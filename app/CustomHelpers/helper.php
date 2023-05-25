<?php
 //echo" hellow";
 use Illuminate\Support\Str;
 //assames soundex code
 if(!function_exists('assamese_soundex')){
    function assamese_soundex($sw){
         $asword = $sw;
         $AssameseWordLength =  Str::length($asword);
         $letter = '';
         $soundex = '';
         $i = 0;
         while ($i <= $AssameseWordLength - 1) {
             $letter = Str::substr($asword, $i, 1);

             if ($letter == 'প') {
                 $soundex = $soundex . 'P';
             } elseif ($letter == 'ফ') {
                 $soundex = $soundex . 'F';
             } elseif ($letter == 'ব' || $letter == 'ৱ') {
                 $soundex = $soundex . 'B';
             } elseif ($letter == 'ভ') {
                 $soundex = $soundex . 'V';
             } elseif ($letter == 'ত' || $letter == 'ট' || $letter == 'ৎ') {
                 $soundex = $soundex . 'T';
             } elseif ($letter == 'থ' || $letter == 'ঠ') {
                 $soundex = $soundex . '1';
             } elseif ($letter == 'দ' || $letter == 'ড') {
                 $soundex = $soundex . 'D';
             } elseif ($letter == 'ধ' || $letter == 'ঢ') {
                 $soundex = $soundex . '2';
             } elseif ($letter == 'ক') {
                 $soundex = $soundex . 'K';
             } elseif ($letter == 'খ') {
                 $soundex = $soundex . '3';
             } elseif ($letter == 'গ') {
                 $soundex = $soundex . 'G';
             } elseif ($letter == 'ঘ') {
                 $soundex = $soundex . '4';
             } elseif ($letter == 'চ' || $letter == 'ছ') {
                 $soundex = $soundex . 'C';
             } elseif ($letter == 'য' || $letter == 'জ') {
                 $soundex = $soundex . 'J';
             } elseif ($letter == 'ঝ') {
                 $soundex = $soundex . '5';
             } elseif ($letter == 'শ' || $letter == 'ষ' || $letter == 'স') {
                 $soundex = $soundex . 'S';
             } elseif ($letter == 'হ' || $letter == 'ঃ' || $letter == ':') {
                 $soundex = $soundex . 'H';
             } elseif ($letter == 'ম') {
                 $soundex = $soundex . 'M';
             } elseif ($letter == 'ন' || $letter == 'ণ') {
                 $soundex = $soundex . 'N';
             } elseif ($letter == 'ঙ' || $letter == 'ং') {
                 $soundex = $soundex . '6';
             } elseif ($letter == 'ৰ' || $letter == 'ড়' || $letter == 'ঢ়') {
                 $soundex = $soundex . 'R';
             } elseif ($letter == 'ল') {
                 $soundex = $soundex . 'L';
             } elseif ($letter == 'য়' || $letter == 'ঞ') {
                 $soundex = $soundex . 'Y';
             } elseif ($letter == '্' || $letter == '্‌') {
                 $soundex = $soundex . 'X';
             } elseif ($letter == 'অ') {
                 $soundex = $soundex . 'A';
             } elseif ($letter == 'ঋ' || $letter == 'ৃ') {
                 $soundex = $soundex . 'W';
             } elseif ($letter == 'া') {
                 $soundex = $soundex . '7';
             } elseif ($letter == 'আ') {
                 $soundex = $soundex . '7';
             } elseif ($letter == 'ই' || $letter == 'ি' || $letter == 'ঈ' || $letter == 'ী') {
                 $soundex = $soundex . 'I';
             } elseif ($letter == 'উ' || $letter == 'ু' || $letter == 'ঊ' || $letter == 'ূ' || $letter == 'ও' || $letter == 'ো') {
                 $soundex = $soundex . 'U';
             } elseif ($letter == 'এ' || $letter == 'ে') {
                 $soundex = $soundex . 'E';
             } elseif ($letter == 'ঐ' || $letter == 'ৈ') {
                 $soundex = $soundex . '8';
             } elseif ($letter == 'ঔ' || $letter == 'ৌ') {
                 $soundex = $soundex . '9';
             } else {
                 $soundex = $soundex . '0';
             }
             $i++;
         }
         // replacements
         $soundex1 = Str::replace('XX', 'X', $soundex);
         $soundex2 = Str::replace('0', '', $soundex1);
         //zuktakhyar
         $soundex3 = Str::replace('HXJ', 'Q', $soundex2);
         $soundex4 = Str::replace('JXJ', 'Q', $soundex3);
         $soundex5 = Str::replace('KXS', '3', $soundex4);
         $soundex6 = Str::replace('JXY', 'Z', $soundex5);
         $soundex7 = Str::replace('GXJ', 'Z', $soundex6);
         $soundex8 = Str::replace('YXC', 'NC', $soundex7);
         $soundex9 = Str::replace('YXJ', 'NJ', $soundex8); 
         $soundex =  $soundex9;//final output
    return  $soundex;   
    }
 }
//Assamese soundex complete	

?>