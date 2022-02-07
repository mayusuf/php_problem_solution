<?php

/*
    A function takes a string containing CSV data and produces a
    PHP array of the following form:

        [
          [ "username"  => "elias"
          , "firstname" => "Elias"
          , "lastname"  => "Müller"
          , "email"     => "elias.mueller@example.com"
          , "password"  => "Eiwoa0Ou!"
          ]
        ,
          [ "username"  => "emil"
          , "firstname" => "Emil"
          , "lastname"  => "Schmidt"
          , "email"     => "emil.schmidt@example.com"
          , "password"  => "aiquah4V!"
          ]
        ,
          [ "username"  => "liam"
          , "firstname" => "Liam"
          , "lastname"  => "Fischer"
          , "email"     => "liam.fischer@example.com"
          , "password"  => "oGh5ooph!"
          ]
        ,
          // ... and so on ...
        ]

    See `test.csv` for example csv data.
*/



/* solution */
  
  define("USERNAME","username");
  define("FIRSTNAME","firstname");
  define("LASTNAME","lastname");
  define("EMAIL","email");
  define("PASSWORD","password");

  define("DELIMITER", ";");


  /**
  * @param string $userInfoString
  * @return array
  */
  function usersFromCSV(string $userInfoString){

    $userInfo = array();

    $userInfoInArray = explode(DELIMITER, $userInfoString);

    $userInfo[USERNAME] = $userInfoInArray[0] ? $userInfoInArray[0] : "";
    $userInfo[FIRSTNAME] = $userInfoInArray[1] ? $userInfoInArray[1] : "";
    $userInfo[LASTNAME] = $userInfoInArray[2] ? $userInfoInArray[2] : "";
    $userInfo[EMAIL] = $userInfoInArray[3] ? $userInfoInArray[3] : "";
    $userInfo[PASSWORD] = $userInfoInArray[4] ? $userInfoInArray[4] : "";

    return $userInfo;
  }



  try{
    
    $fileName = "test.csv";

    $delimiter=',';
    $enclosure='"';
    $escape='\\';
 

    if(file_exists($fileName)){

        $fileHandler = new SplFileObject($fileName, 'r');

        $fileHandler->setCsvControl($delimiter, $enclosure, $escape);

        $allUserRes = array();

        foreach ($fileHandler as $row => $line) {
                    

            if(($row != 0) && (mb_strlen($line,'utf8') > 0)){

              $singleUser = usersFromCSV($line); // Function is called here

              array_push($allUserRes,$singleUser);  
            }
            
        }
   

        echo "<pre>";

          print_r($allUserRes); // Print all users info in an array

        echo "</pre>";      

    }

  }catch(Error $e){

    echo $e->getMessage();

  }

