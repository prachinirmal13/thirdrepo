<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'registrationform');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
<html>
<head></head>
<body>

<?php
$firstnameErr = $lastnameErr = $emailidErr="";
$id = $firstname = $lastname = $emailid = $password = $gender = $address = $birthdate ="";
	
    if (isset($_POST['submit']))
	                                                         
	{
		$id = $_POST['id'];
       
		$firstname = $_POST['firstname'];
		if (empty($_POST["firstname"]))
			{
    $firstnameErr = "<i>Name is required</i>";
             } 
			 else 
			 {
		if(!preg_match("/^([a-zA-Z' ]+)$/",$firstname))
		{
			$firstnameErr= "<i> only letters allowd </i>";
		}
			 }
		$lastname=$_POST['lastname'];
		if (empty($_POST["lastname"]))
			{
    $lastnameErr= "<i>Name is required</i>";
             } 
			 else 
			 {	
		if(!preg_match("/^([a-zA-Z' ]+)$/",$lastname))
		{
			$lastnameErr= "<p> only letters allowd </p>";
		}
			 }
		
	$emailid = $_POST['emailid'];
	if(empty($_POST["emailid"]))
	{
		$emailidErr= "<i>emailid is required</i>";
	}
	else
	{
		if(!filter_var($emailid,FILTER_VALIDATE_EMAIL))
		{
			$emailidErr= "<i>invalid emailid </i>";
		}
	}
        $password = $_POST['password'];
		$gender=$_POST['gender'];
	  $address=$_POST['address'];
	 $birthdate=$_POST['birthdate'];
 
        $query = "INSERT INTO `registertable` (id, firstname, lastname, emailid, password, gender,address ,birthdate) VALUES ('$id','$firstname', '$lastname','$emailid','$password','$gender','$address','$birthdate')";
        $run = mysqli_query($connection, $query);
        if($run)
		{
            echo "User Created Successfully.";
        }else{
            echo"User Registration Failed".mysqli_error($connection);
        }
	}
		
?>
    
<center><h1 style="color:red;"><i>REGISTRATION FORM </p></i></h1></center>
<div class="form">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<center>
<table>
<tr>
<th></th>
<th>REGISTRATION FORM</th>
</tr>
<tr>
<td>  ID </td>
<td><input type="int" name="id" placeholder="id" required=""></td>
</tr>
<tr>
<td>  First Name<span class="error">*<?php echo $firstnameErr;?></span></td>
<td><input type="text" name="firstname" placeholder="firstname" ></td>
<td> <value="<?php echo $firstname;?>"></td>
</tr>

<tr>
<td>  Last Name <span class="error">* <?php echo $lastnameErr;?></span></td>
<td><input type="text" name="lastname" value="<?php echo $lastname;?>"placeholder="lastname" ></td>

</tr>

<tr>
<td> Email ID  <span class="error">* <?php echo $emailidErr;?></span></td>
<td><input type="email" name="emailid" value="<?php echo $emailid;?>" placeholder="emailid"></td>
</tr>

<tr>
<td>  Password</td>
<td><input type="password" name="password" placeholder="password" required=""></td>
</tr>

<tr>
<td> Confirm Password</td>
<td><input type="password" name="password" placeholder="password" required=""></td>
</tr>

<tr>
<td> Gender</td>
<td><input type="radio" name="gender" value="male" checked placeholder="gender" required="">male<br>
<input type="radio" name="gender" value="female" checked placeholder="gender" required="">female<br>
<input type="radio" name="gender" value="others" checked placeholder="gender" required="">others<br>
</td>
</tr>

<tr>
<td>  Address</td>
<td><input type="text" name="address" placeholder="address" required=""></td>
</tr>

<tr>
<td> Birth Date</td>
<td><input type="date" name="birthdate" placeholder="birthdate" required=""></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="submit" name="submit"></td>
</tr>
</tr>
</table>
</center>
</form>
</div>
</body>
</html>




