<?php
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE users set first_name='" . $_POST["first_name"] . "', last_name='" . $_POST["last_name"] . "', age='" . $_POST["age"] . "', mobile_number='" . $_POST["mobile_number"] . "', pan='" . $_POST["pan"] . "', pincode='" . $_POST["pincode"] . "', address='" . $_POST["address"] . "', city='" . $_POST["city"] . "', state='" . $_POST["state"] . "', country='" . $_POST["country"] . "' WHERE userId='" . $_POST["userId"] . "'";
	mysqli_query($conn,$sql);
	$message = "Record Modified Successfully";
	header("location:index.php");
}
$select_query = "SELECT * FROM users WHERE userId='" . $_GET["userId"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Add New User</title>
<!-- <link rel="stylesheet" type="text/css" href="styles.css" /> -->
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
    <td colspan="2">Edit User</td>
</tr>
<tr>

<td><input type="hidden" name="userId" class="txtField" value="<?php echo $row['userId']; ?>"></td>
</tr>
<tr>
	<td><label>First Name</label></td>
	<td><input type="text" name="first_name" class="txtField" value="<?php echo $row['first_name']; ?>"></td>
</tr>
<td><label>Last Name</label></td>
<td><input type="text" name="last_name" class="txtField" value="<?php echo $row['last_name']; ?>"></td>
</tr>
<tr>
<td><label>D.O.B</label></td>
<td><input type="date" name="age" id="age" value="<?php echo $row['age']; ?>"></td>
</tr>
<tr>
<td><label>Mobile number</label></td>
<td><input required placeholder="enter 10 digit mobile number" autofocus pattern="[0-9]{10}" maxlength="10" size="10"  type="text" name="mobile_number" id="mobile_number" value="<?php echo $row['mobile_number']; ?>"></td>
</tr>
<tr>
	<td><label>Pan card</label> </td>
	<td><input required type="text" name="pan" id="pan"  autofocus value="<?php echo $row['pan']; ?>" ></td>
</tr>
<tr>
	<td><label>Pincode</label> </td>
	<td><input required type="text" name="pincode" id="pincode" autofocus maxlength="6" size="6" value="<?php echo $row['pincode']; ?>"></td>
</tr>
<tr>
	<td><label>Address</label> </td>
	<td><input required type="text" name="address" id="address" autofocus value="<?php echo $row['address']; ?>" ></td>
</tr>
<tr>
	<td><label>City</label> </td>
	<td><input required type="text" name="city" id="city" autofocus value="<?php echo $row['city']; ?>"></td>
</tr>
<tr>
	<td><label>State</label> </td>
	<td><input required type="text" name="state" id="state" autofocus value="<?php echo $row['state']; ?>"></td>
</tr>
<tr>
	<td><label>Country</label> </td>
	<td><input required type="text" name="country" id="country" autofocus value="<?php echo $row['country']; ?>" ></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>