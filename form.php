<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
<style>
body {
    background:#1c1c1c;
}
.cont {
    margin:30px auto;
    width:230px;
    padding:40px;
    background:snow;
    border-radius:9px;
}
input:not(input[type="radio"]) {
    padding:5px;
    display:block;
}
.code {
    width: 300px;
    background:white;
    color:mediumseagreen;
    padding:20px;
    border-radius:10px;
    margin:20px auto;
}
span {
    color:red;
}
.data {
    width:300px;
    padding:20px;
    margin:10px auto;
    border-radius:9px;
    background:ghostwhite;
    color:dodgerblue;

}
</style>
</head>
<body>
    <div class="backend">

<?php 
    
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $fname = $lname = $email = $gender = $phone = $comment = "";
    $fnameErr = $lnameErr = $emailErr = $genderErr = $phoneErr = "";

    function test($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	return $data;
    }

    if(empty($_POST['fname'])){
	$fnameErr = "Required";
    }
    else{
	$fname =  test($_POST['fname']);
    }
    if(empty($_POST['lname'])){
	$lnameErr = "Required";
    }
    else{
	$lname =  test($_POST['lname']);
    }
    if(empty($_POST['email'])){
	$emailErr = "Required";
    }
    else{
	$email =  test($_POST['email']);
    }
    if(empty($_POST['gender'])){
	$genderErr = "Required";
    }
    else{
	$gender =  test($_POST['gender']);
    }
    if(empty($_POST['phone'])){
	$phoneErr = "Required";
    }
    else{
	$phone =  test($_POST['phone']);
    }
}
 ?>
    </div>

<div class="cont">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<label for="fname">First Name
	    <span>* <?php echo $fnameErr; ?></span>
	</label><br>
	<input id="fname"type="text"name="fname"value="<?php echo $fname;?>"><br>

	<label for="lname">Last Name
	    <span>* <?php echo $lnameErr; ?></span>
	</label><br>
	<input id="lname" type="text" name="lname" value="<?php echo $lname;?>"><br>

	<label for="email">Email
	    <span>* <?php echo $emailErr; ?></span>
	</label><br>
	<input id="email" type="email" name="email" value="<?php echo $email;?>"><br>
	<label>Gender
	    <span>* <?php echo $genderErr; ?></span>
	</label><br>
	<label for="male">Male</label>
	<input id="male" type="radio" name="gender" value="male" <?php if($gender == "male"){echo "checked";} ?>>
	<label for="female">Female</label>
	<input id="female" type="radio" name="gender" value="female" <?php if($gender == "female"){echo "checked";} ?>>
	<label for="others">Others</label>
	<input id="others" type="radio" name="gender" value="others" <?php if($gender == "others"){echo "checked";} ?>>
	<br><br>

	<label for="phone">Phone No
	    <span>* <?php echo $phoneErr;?></span>
	</label><br>
	<input type="number" name="phone" id="phone" value="<?php echo $phone;?>"><br>

	<label for="comment">Comment</label>
	<textarea id="comment" name="comment" cols="30" rows="5" ></textarea>
	<br><br>
	<input type="submit" value="Submit">
    </form>
</div>

    <div class="data">
	<?php 
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
	    echo "Your First name is ". $fname . ". <br>";
	    echo "Your Last name is ". $lname . ". <br>";
	    echo "Your Email is ". $email . ". <br>";
	    echo "You are  a ". $gender . ". <br>";
	    echo "Your Phone no is ". $phone . ". <br>";
	    echo "You have typed \" ". $comment . "\". <br>";
	    }
	 ?>
    </div>    
</body>
</html>
