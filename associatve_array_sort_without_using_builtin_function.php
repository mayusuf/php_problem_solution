<?php

/*
    A function which takes an array of associative arrays and a string key.  The function shall return an array of the same associative arrays
    sorted by their values for the given key.

    Assume that every given associative array contains the
    given key and that all values are trivially comparable.

   
*/



/* solution */
	
	/**
  	* @param array $arrayOfColumn
  	* @param string $dataColumnkeys
  	* @return array arrayOfColumnkeys
  	*/
	function sortArrayIndex(array $arrayOfColumn,array $arrayOfColumnkeys){

		for($i=0; $i < count($arrayOfColumn)-1;$i++){

			if($arrayOfColumn[$i] > $arrayOfColumn[$i+1]){
						
				$tmp = $arrayOfColumn[$i+1];
				$arrayOfColumn[$i+1] = $arrayOfColumn[$i];
				$arrayOfColumn[$i] = $tmp;

				$tmp = $arrayOfColumnkeys[$i+1];
				$arrayOfColumnkeys[$i+1] = $arrayOfColumnkeys[$i];
				$arrayOfColumnkeys[$i] = $tmp;
				$i=-1;
			}
		}

		return $arrayOfColumnkeys;

	}

	/**
  	* @param array $data
  	* @param string $key
  	* @return array 
  	*/
	function sort_by(array $data,string $key):array{

		try{

			if(is_array($data) && !empty($key)){

				$arrayOfColumn = array();
				$arrayOfColumnkeys = array();

				$arrayOfColumn = array_column($data, $key); // Array of given key's value

				for($i=0; $i<count($arrayOfColumn); $i++) { 
					$arrayOfColumnkeys[$i] = $i;	// Array of index of arrayofColumn
				}

				//Sorting given key's values. At the sametime index of sorted values are also sorted
				$arrayOfColumnkeys = sortArrayIndex($arrayOfColumn,$arrayOfColumnkeys); // 

				$result = array();

				foreach ($arrayOfColumnkeys as $key => $value) {
					array_push($result,$data[$value]);
				}

				return $result;				
			
			}else{

				throw new Exception("Error : Given array or Key is Empty");
				
			}

		}catch(Exception $e){

			echo $e->getMessage();

		}
	}

	$data = [
		['price' => 4, 'item' => 'Apple'],
	    ['price' => 8, 'item' => 'Bio Apple'],
	  	['price' => 5, 'item' => 'Mango Maxican'],
	  	['price' => 2, 'item' => 'Mango Indian'],  
	];
	
	echo "<pre>";
		
		print_r(sort_by($data,"price"));  

	echo "</pre>";
	
