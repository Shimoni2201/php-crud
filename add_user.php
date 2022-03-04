<?php
if(count($_POST)>0) {
	require_once("db.php");
// 	$sql = "INSERT INTO `users` (`first_name`, `last_name`, `age`, `mobile_number`, `pan`, `pincode`, `address`, `city`, `state`, `country`, `pic`)
// VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["age"]."', '".$_POST["mobile_number"]."', 
// '".$_POST["pan"]."', '".$_POST["pincode"]."', 
// '".$_POST["address"]."', '".$_POST["city"]."', '".$_POST["state"]."', '".$_POST["country"]."',  '$imgnewfile')";
$ppic=$_FILES["pic"]["name"];
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$imgnewfile=md5($imgfile).time().$extension;
move_uploaded_file($_FILES["pic"]["tmp_name"],"pics/".$imgnewfile);

$sql = "INSERT INTO `users` (`first_name`, `last_name`, `age`, `mobile_number`, `pan`, `pincode`, `address`, `city`, `state`, `country`, `pic`)
VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["age"]."', '".$_POST["mobile_number"]."', 
'".$_POST["pan"]."', '".$_POST["pincode"]."', 
'".$_POST["address"]."', '".$_POST["city"]."', '".$_POST["state"]."', '".$_POST["country"]."',  '$imgnewfile')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
		header("location:index.php");
	}
}
}
?>
<html>
<head>
<title>Add New User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
table{
    width: 80%;
    margin: 40px auto;
    background: darkslategrey;
    color: aliceblue;
    
}
table.form{
    text-align: left;
    width: fit-content;
    font-size: large;
    size: 2;
    
}
	</style>
</head>
<body>
<div align="center">
	<form  name="frmUser" method="post" id="quickform" enctype="multipart/form-data">

<div style="width:500px;">

<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Personal details</td>
</tr>
<tr>
<td><label>First Name</label></td>
<td>
<input type="text" name="first_name" id="first_name" required autofocus>
</td>
</tr>
<tr>
<td><label>Last Name</label></td>
<td><input type="text" name="last_name" id="last_name" required autofocus></td>
</tr>
<tr>
<td><label>D.O.B</label></td>
<td><input type="date" name="age" id="age"></td>
</tr>
<tr>
<td><label>Mobile number</label></td>
<td><input required placeholder="enter 10 digit mobile number" autofocus pattern="[0-9]{10}" maxlength="10" size="10"  type="text" name="mobile_number" id="mobile_number"></td>
</tr>
<tr>
	<td><label>Pan card</label> </td>
	<td><input required type="text" name="pan" id="pan"  autofocus ></td>
</tr>
<tr>
	<td><label>Pincode</label> </td>
	<td><input required type="text" name="pincode" id="pincode" autofocus maxlength="6" size="6"></td>
</tr>
<tr>
	<td><label>Address</label> </td>
	<td><input required type="text" name="address" id="address" autofocus ></td>
</tr>
<tr>
	<td><label>City</label> </td>
	<td><input required type="text" name="city" id="city" autofocus ></td>
</tr>
<tr>
	<td><label>State</label> </td>
	<td><input required type="text" name="state" id="state" autofocus ></td>
</tr>
<tr>
	<td><label>Country</label> </td>
	<td><input required type="text" name="country" id="country" autofocus ></td>
</tr>
<tr>
	<td>
	<input type="file" class="form-control" name="pic"  required="true">
	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</div>
</body></html>