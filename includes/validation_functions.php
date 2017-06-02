<?php
	
	$errors = array();
	
	function fieldname_as_text($fieldname){
		$fieldname = str_replace("-", " ", $fieldname);
		$fieldname = ucfirst($fieldname);

		return $fieldname;
	}

	//*presence
	function has_presence($value){
		return isset($value) && $value!=="";
	}
	//*string length

	function validate_presences($required_fields){
		global $errors;
		
		foreach ($required_fields as $field){
			if(isset($_POST[$field])){
				$value=trim($_POST[$field]);
				if(!has_presence($value)){
					$errors[$field] = fieldname_as_text($field)." can't be blank";
				}
			}else{
				$errors[$field] = fieldname_as_text($field)." can't be blank";
			}
		}
		$_SESSION['errors'] = $errors;
	}
	
	//Min Length 
	function has_min_length($value, $min){
		return strlen("$value")>$min;
	} 
	
	//max legth
	function has_max_length($value,$max){
		return strlen("$value")<=$max;
	} 

	function validate_max_lengths($fields_with_max_lengths){
		global $errors;

		//Expects an assoc array
		foreach($fields_with_max_lengths as $field=>$max){
			$value = trim($_POST[$field]);
			if(!has_max_length($value, $max)){
				$errors[$field] = fieldname_as_text($field)." is too long";
			}
				$_SESSION['errors'] = $errors;
		}
	}
	//*inclusion in a set
	function is_a_part($value, $set){
		return in_array($value, $set);
		}
	function are_ints($required_fields){
		global $errors;
		
		foreach($required_fields as $field){
			if(!is_int($field)){
				$errors[$field]= fieldname_as_text($field)." has to be a number";
			}
		}
			$_SESSION['errors'] = $errors; 	
	}
	
	function validate_exact_lengths($fields_with_exact_lengths){

		global $errors;
		
		foreach($fields_with_exact_lengths as $field=>$length){
			if(strlen($_POST[$field])!=$length){
				$errors[$field] = $field. " MUST have {$length} numbers";
			}
				$_SESSION['errors'] = $errors;
		}
	
	}
	function has_character($field, $character){
		return strchr($field, $character);
	}
	?>