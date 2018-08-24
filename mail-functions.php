<?php
//Functions used in the parse files for validations and what not

//====================================================================
//form functions to trim all values from $_POST[]
//====================================================================
function trim_value(&$value){
  if(gettype($value) == 'string'){
    $value = trim($value);
  }
  if(gettype($value) == 'array'){
      array_walk($value, 'trim_value');
  }
};
//====================================================================
//check if required elements have a value
//====================================================================
function checkRequired($requiredArray,  $server_dir, $next_page, $query_string){
  //set counter to 0
  $requiredCount = 0;
  //check for empty fields
  foreach($requiredArray as $require){
    if(empty($require)){
      ++$requiredCount;
    }
  }
  //redirect back with error
  if($requiredCount > 0){
    $query_string .= '&success=required';
    header('Location: https://' . $server_dir . $next_page . $query_string);
    exit();
  }
};
//====================================================================
//check emails if they are valid or not and return with error if so
//====================================================================
function checkEmailValid($emailArray, $server_dir, $next_page, $query_string){
  $isEmailValid = 0;
  foreach($emailArray as $emailToCheck){
    $check = filter_var($emailToCheck, FILTER_VALIDATE_EMAIL);
      if($check === false){
        ++$isEmailValid;
      }
  }
  //if $isEmailValis is greater than 0 then there are issues with one
  //or more of the emails so redirect to form and trigger error message
  if($isEmailValid > 0){
    $query_string .= '&success=email';
    header('Location: https://' . $server_dir . $next_page . $query_string);
    exit();
  }
};
//====================================================================
//check honeypots
//====================================================================
function checkHoneypot($honeyArray, $server_dir, $next_page, $query_string){
  $honeyCount = 0;
  foreach($honeyArray as $honey){
    if($honey !== ''){
      ++$honeyCount;
    }
  }

  if($honeyCount > 0){
    $query_string = '?first_name=Edward';
		$query_string .= '&success=true';
		header('Location: https://' . $server_dir . $next_page . $query_string);
		exit();
  }
};
//====================================================================
//Form time to complete
//====================================================================
function formTimeCheck($formTimeLimit, $server_dir, $next_page, $query_string){
  
  if(!isset($_SESSION['formLoadTime'])){
    $query_string .= '&success=false';
    header('Location: https://' . $server_dir . $next_page . $query_string);
    exit();
  }else{
    $formLoadTime = $_SESSION['formLoadTime'];
    unset($_SESSION['formLoadTime']);
    $formSubmitTime = time();
    $formTimeSeconds = $formSubmitTime - $formLoadTime;
    if($formTimeSeconds < $formTimeLimit){
      $query_string .= '&success=false';
      header('Location: https://' . $server_dir . $next_page . $query_string);
      exit();
    }
  }
};

//end doc
?>