<?php

/*
    function `random_int` to select characters from
    `$chars` by index.

    `randgen( "abc" , 5 )` could result in
    one of the following strings:

        "ccbba"
        "ccaab"
        "baaaa"
        "bccaa"
        "bacbb"
        "bcaba"
        "bbbbc"
        "bbcca"
*/



/*  solution */
    
    /**
    * @param string $chars
    * @param int $len
    * @return string
    */
    function randgen(string $chars, int $len):string {

        try{

            if($len <= 0){
                throw new Exception("Error : Length Must not Zero or less then Zero");
            }

            $res="";

            $max = mb_strlen($chars, 'utf8')-1;

            for ($i = 0; $i < $len; $i++) {
                $res .= $chars[random_int(0, $max)];
            }

            return $res;

        }catch(Exception $e){

            $e->getMessage();
        }

}

$inputStr = "abcdABCD";
$length = 5;

echo randgen($inputStr,$length);

