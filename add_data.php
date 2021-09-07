  <?php

include "header.php";
// define variables and set to empty values
$error = [];
$error['fnameErr'] = $error['lnameErr'] = $error['emailErr'] = $error['dobErr'] = $error['phoneErr']
 = $error['designationErr'] = $error['genderErr'] = $error['hobyErr'] = "";
$fname = $lname = $email = $dob = $phone = $designation = $gender = $hobi = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $error['fnameErr'] = "First Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $error['lnameErr'] = "last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
  }

  if (empty($_POST["email"])) {
    $error['emailErr'] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["dob"])) {
    $error['dobErr'] = "dob is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["phone"])) {
    $error['phoneErr'] = "phone number is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["designation"])) {
    $error['designationErr'] = "designation is required";
  } else {
    $designation = test_input($_POST["designation"]);
  }

  if (empty($_POST["gender"])) {
    $error['genderErr'] = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST['Hobbies'])) {
    $error['hobyErr'] = "Hobbies is required";
  } else {
    $hobbies= $_POST['Hobbies'];
    $hobi = implode(", ",$hobbies);
}


if(empty($error['fnameErr']) &&empty($error['lnameErr']) && empty($error['hobyErr']) && empty($error['emailErr']) &&
empty($error['genderErr']) && empty( $error['designationErr']) && empty($error['phoneErr']) 
&& empty($error['dobErr'])
){

    $conn= mysqli_connect("localhost", "root", "", "task2") or die("Connection Error");
    
    $sql="insert into user_info 
    (fname, lname, email, dob, phone, designation, gender, hobbies) 
    value('{$fname}', '{$lname}', '{$email}', '{$dob}', '{$phone}', '{$designation}', '{$gender}', '{$hobi}' )";
    
    if(mysqli_query($conn, $sql)){
        header("Location: http://localhost/project/task2/view_data.php");
        
    }else{
        echo "Data Not Added";
    }
} } ?>

<div id="wrapper">
<div id="main-content">
    <h2>Form with Validation</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="validate_form">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" />
            <span class="error">* <?php echo $error['fnameErr'];?></span>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" />
            <span class="error">* <?php echo $error['lnameErr'];?></span>
        </div>
        <div class="form-group">
            <label>Email ID</label>
            <input type="email" class="form-control" name="email" id="email" />
            <span class="error">* <?php echo $error['emailErr'];?></span>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="dob" />
            <span class="error">* <?php echo $error['dobErr'];?></span>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone"/>
            <span class="error">* <?php echo $error['phoneErr'];?></span>
        </div>
        <div class="form-group">
            <label>Designation</label>
            <input type="text" class="form-control" name="designation" id="designation"/>
            <span class="error">* <?php echo $error['designationErr'];?></span>
        </div>
        <div class="form-group">
            <label>Gender</label> <br>
            <input type="radio" class="form-control" name="gender" value="male"/> Male  <br/>  
            <input type="radio" class="form-control" name="gender" value="female"/> Female <br/>
            <span class="error">* <?php echo $error['genderErr'];?></span>
        </div>
        <div class="form-group">
            <label>Hobbies</label> <br>
                 <input type="checkbox" name="Hobbies[]" value="Cricket" />    
                 <label>Cricket</label> <br>    
                 <input type="checkbox"  name="Hobbies[]" value="Video Game" />    
                 <label>Video game</label> <br>    
                 <input type="checkbox" name="Hobbies[]" value="Reading"/>    
                 <label>Reading</label> <br>  
                 <input type="checkbox" name="Hobbies[]" value="Writing"/>    
                 <label>Writing</label>
                 <span class="error">* <?php echo $error['hobyErr'] ;?></span>    
        </div>
        
            <input class="submit" type="submit" name="submit" value="Submit"  />
    </form>
         
</div>
</div>
</body>
</html>