<?php
	include_once('Connections/database_connection.php');

	$errors=array();
//PHP PROCESSING FUNCTIONS
	function redirect_to($new_location){
		header("Location: ".$new_location);
		exit;
	}
	
	function pre($block){
        if(gettype($block) == "array"){
            echo "<pre>";
            print_r($block);
            echo "</pre>";
        }else{
            echo "<pre>".$block."</pre>";
        }
    }
	
	function print_null($value){
			if(is_null($value)){
					echo("");
				}else{
						echo $value;
					}
		}
		
	function check_login(){
			if(!isset($_SESSION['user_id'])){
					redirect_to('index.php');
				}
		}
// PHP DATABASE OPERATIONS	
	function mysql_prep($string){
		global $connection;

		$escaped_string=mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set){
		global $connection;
		
		if(!$result_set){
				 die("Database Query failed".mysqli_error($connection));
			}
		}
		

	function find_patient($patient_id){
		global $connection;
		$query = "SELECT * FROM receptiomadd ";
		$query .= " WHERE ID ='{$patient_id}' ";

		$patient_set = mysqli_query($connection, $query);
		confirm_query($patient_set);

		// pre(mysqli_fetch_array($patient_set));
		return $patient_set;
	}


	//USER CRUD OPERATIONS

	function find_patients($limit=0, $page=0){
		$offset = (int) $page * 15;
		global $connection;
		$query = "SELECT * FROM receptiomadd ORDER BY sname DESC "; 
		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}
		

		$patient_set = mysqli_query($connection, $query);
		confirm_query($patient_set);


		return $patient_set;
	}


	function find_visits($page=0, $limit=0){
		$offset = (int) $page * 10 ;
		global $connection;
		$query = "SELECT * FROM visits WHERE checkout IS NULL ORDER BY timestamp DESC ";
		if($limit>0){
			$query .= "LIMIT 10 OFFSET {$offset} ";
		}
		 

		$visit_set = mysqli_query($connection, $query);
		confirm_query($visit_set);

		// pre(mysqli_fetch_array($patient_set));
		return $visit_set;
	}

	function find_visit($visit_id){
		global $connection;
		$query = "SELECT * FROM visits ";
		$query .= "WHERE visit_id={$visit_id} ";

		$visit_set = mysqli_query($connection, $query);
		confirm_query($visit_set);

		// pre(mysqli_fetch_array($patient_set));
		return $visit_set;
	}




	//USER CRUD OPERATIONS
	function login($username ,$password){
		global $connection;
		global $errors;


		$query = "SELECT * FROM staff WHERE username='{$username}' ";
		$staff = mysqli_fetch_assoc(mysqli_query($connection, $query));
		// pre($staff);
		if($staff){
			//check password
			if($staff['password']==$password){

				$_SESSION['name'] = $staff['name'];
				$_SESSION['ID'] =  $staff['ID'];
				$_SESSION['level'] = $staff['level'];
				$_SESSION['image'] = $staff['image'];
				$_SESSION['username'] = $staff['username'];

					// restricting page access
				if($staff['level'] == '0'){
					redirect_to('reception.php');
				}
				elseif($staff['level'] == '1'){
					redirect_to('visitque.php');
				}
				elseif ($staff['level'] == '2'){
					redirect_to('doctor.php');
				}
				elseif ($staff['level'] == '3'){
					redirect_to('lab.php');
				}
				elseif ($staff['level'] == '4'){
					redirect_to('phermacy.php');
				}
				elseif($staff['level'] == '5'){
					redirect_to('Admin.php');

				}	
			}else{
				$errors['creds'] = "Username/password does not match";
			}

		}else{
			//No staff found with those details 
			$errors['exist'] = "No staff found";
		}
		$_SESSION['errors'] = $errors;
		
	}

	function errors(){

		if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
			$errors = $_SESSION['errors'];
			
			$output = "<div id='errors' class='alert alert-danger'>";
			$output .= "You have the following errors: <br>";
			$output .= "<ul>";
			foreach ($errors as $error) {
				$output .= "<li>".$error."</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";

			$_SESSION['errors'] = null;

			return $output;
		}

	}	

	function messages(){
		if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
			$message = $_SESSION['message'];
			$_SESSION['message'] = null;

			$output = '<div class="alert alert-info">';
			$output .= $message;
			$output .= '</div>';

			return $output;
		}
	}
		

		
	

	function logout(){

		session_destroy();

		redirect_to('loginindex.php');
	}

	function find_staff($page=0, $limit=0){
		$offset = (int) $page * 10;
		global $connection;

		$query = "SELECT * FROM staff ORDER BY name DESC ";
		
		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}

		$staff_set = mysqli_query($connection, $query);
		confirm_query($staff_set);

		
		return $staff_set;
	}

	function find_staffs($username){

		global $connection;

		$query = "SELECT * FROM staff WHERE username='{$username}' ";
		
		

		$staff = mysqli_query($connection, $query);
		confirm_query($staff);

		
		return $staff;
	}

//FINDING DOCTORS ONLY IF TEMP AND AGE IS FILLED

	function find_doctors($page=0, $limit=0){
			$offset = (int) $page * 15;
		global $connection;

		$query = "SELECT * FROM visits WHERE temp IS NOT NULL AND checkout IS NULL ORDER BY timestamp DESC ";

		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}

		$visit_set = mysqli_query($connection, $query);
		confirm_query($visit_set);

		return $visit_set;

	}

	function find_doctor($visit_id){

		global $connection;

		$query = "SELECT * FROM visits ";
		$query .= "  WHERE visit_id='{$visit_id}' ";

		$doc_set = mysqli_query($connection, $query);
		confirm_query($doc_set);

		return $doc_set;
	}

// END OF FINDING DOCTORS

// FINDING LAB ONLY IF TEST 1 IS FILLED


	function find_labs($page=0, $limit=0){
			$offset = (int) $page * 15;
		global $connection;

		$query = "SELECT * FROM visits WHERE test1 OR test2 OR test3 IS NOT NULL ORDER BY visit_id DESC ";

		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}

		$lab_set = mysqli_query($connection, $query);
		confirm_query($lab_set);

		return $lab_set;

	}

		function find_lab($visit_id){

		global $connection;

		$query = "SELECT * FROM visits WHERE visit_id={$visit_id} ";

		$lab_set = mysqli_query($connection, $query);
		confirm_query($lab_set);

		return $lab_set;

	}

	//end of finding laboratory test

	// FINDING LAB RESULS

	function find_results($page=0, $limit=0){
		$offset = (int) $page * 15;

		global $connection;

		$query = "SELECT * FROM visits WHERE result1 OR result2 OR result3 IS NOT NULL AND checkout IS NULL ORDER BY timestamp DESC ";

		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}

		$result_set = mysqli_query($connection, $query);
		confirm_query($result_set);

		return $result_set;

	}

		function find_result($visit_id){
		

		global $connection;

		$query = "SELECT * FROM visits WHERE visit_id={$visit_id} ";


		$result_set = mysqli_query($connection, $query);
		confirm_query($result_set);

		return $result_set;

	}


	function find_pherms($page=0, $limit=0){
			$offset = (int) $page * 15;
		global $connection;

		$query = "SELECT * FROM visits WHERE prescription IS NOT NULL AND checkout IS NULL ORDER BY timestamp DESC ";

		if($limit>0){
			$query.= "LIMIT 15 OFFSET {$offset}";
		}


		$visit_set = mysqli_query($connection, $query);
		confirm_query($visit_set);

		return $visit_set;

	}

	function find_comments($page=0, $limit=0){
		$offset = (int) $page * 4;
			global $connection;

			$query = "SELECT * FROM comment ORDER BY timestamp DESC";

		if($limit>0){
			$query.= "LIMIT 4 OFFSET {$offset}";
		}	

			$comment_set = mysqli_query($connection, $query);
				confirm_query($comment_set);

		return $comment_set;
	}

	function find_books($page=0, $limit=0){
		$offset = (int) $page * 4;
			global $connection;

			$query = "SELECT * FROM bookappointment ORDER BY date DESC";
		if($limit>0){
			$query.= "LIMIT 4 OFFSET {$offset}";
		}	

			$app_set = mysqli_query($connection, $query);
			confirm_query($app_set);

		return $app_set;
	}

	function find_all_visits($visit_id){
			global $connection;

			$query = "SELECT * FROM visits ";
			$query .= "WHERE visit_id='{$visit_id}' ";

			$visits_set = mysqli_query($connection, $query);
			confirm_query($visits_set);

			return $visits_set;

	}

		// for generating pdf
	function find_all($visit_id){
			global $connection;

			$query = "SELECT * FROM visits WHERE visit_id={$visit_id} ";

			$all_visits = mysqli_query($connection, $query);
			confirm_query($all_visits);

			return $all_visits;

	}

	function staff_activity($page=0, $limit=0){
			$offset = (int) $page * 5;
		global $connection;

		$query = " SELECT * FROM visits WHERE checkout IS NOT NULL ";

		if($limit>0){
			$query.= "LIMIT 5 OFFSET {$offset}";
		}

		$staff_activity = mysqli_query($connection, $query);
		confirm_query($staff_activity);

		return $staff_activity;

	} 


	
