<?php 

include("dbconfig.php");

if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error :you did not enter a valid email.";
	}
	else {
		$sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:#fff'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:#fff'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}



if(!empty($_POST["idno"])) {
	$idno= $_POST["idno"];
$sql ="SELECT IdNo FROM tblusers WHERE IdNo=:idno";
$query= $dbh -> prepare($sql);
$query-> bindParam(':idno', $idno, PDO::PARAM_INT);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
 echo "<span style='color:#fff'> ID number already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
 echo "<span style='color:fff'> ID Available.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>