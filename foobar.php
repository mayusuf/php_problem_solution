<?php

/*
    Task:

    Write a function `foobar` which takes an integer `$n`
    and returns one of the following values:

    (1) When `$n` is a multiple of 5, `foobar($n)` should
        return the string "foo".

    (2) When `$n` is a multiple of 7, `foobar($n)` should
        return the string "bar".

    (3) When `$n` is a multiple of 5 and a multiple of 7,
        `foobar($n)` should return the string "foobar".

    (4) Otherwise, `foobar($n)` should return `$n`.
*/



/* Your solution: */
    
    /**
    * @param int $n
    * @return string
    */
    function foobar(int $n):string{

        $lcm = 5*7; 

        if($n == 0) return $n;

        if($n % $lcm == 0){
                
            $res = "foobar";

        }else if($n % 5 == 0){

            $res = "foo";

        }else if($n % 7 == 0){

            $res = "bar";

        }else{

            $res = $n;

        }

        return $res;

    }

    // The function only takes integer value. 
    // if the value is float then the value converted into integer
    $input = 70;
    echo foobar($input);

// ...
