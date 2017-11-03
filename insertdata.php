<?php
include('layouts/config.php');
$nameErr = $emailErr = $phoneErr = "";
$name = $email = $phone = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if( isset( $_POST['user_name'] ) )
{

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$date=date("Y-m-d H:i:s");

if (empty($name)) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($name);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed in the name field"; 
      
    }
}

if (empty($phone)) {
    $nameErr = "Phone is required";
  } else {
    $phone = test_input($phone);
    // check if name only contains numbers
    if (!preg_match("/^[0-9]*$/",$phone)) {
      $phoneErr = "* Only numbers are allowed in the phone field"; 
      
    }
}

if(!empty($nameErr)){
  echo '<p style="color:red">'.$nameErr.'</p>';
  exit();
}
if(!empty($phoneErr)){
  echo '<p style="color:red">'.$phoneErr.'</p>';
  exit();
}

$q1 = "select id from lead where ( email='$email' or phone= '$phone' ) limit 1";

$res = $con->query($q1);

if($res->num_rows > 0){

    echo '<p style="color:#fff">We already have your information. We will contact you soon.</p>';

}else{ 
  $q2 = "insert into lead(name,email,phone,created_at) values ('$name','$email','$phone','$date')";

if($con->query($q2)===TRUE){

  echo "success";
    }else{
  echo '</p style="color:red">Problem with connections.';
      }
  }

$con->close();
}
?>