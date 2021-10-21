<?php

$pName = $_POST['pName'];
$pSex = $_POST['pSex'];
$pYear = $_POST['pYear'];
$pGroup = $_POST['pGroup'];
$pPhone = $_POST['pPhone'];

//connect
$conn = mysqli_connect('localhost', 'root', '', 'quanlinganhangmau','3306');
if(!$conn){
    die("Kết nối không thành công");
}

//th truy vấn

$sql = "Insert into blood_donor(bd_name, bd_sex, bd_age, bd_bgroup, bd_phno) values ('$pName', '$pSex', '$pYear', '$pGroup', '$pPhone')";

$result = mysqli_query($conn, $sql);

if($result>0){
    header("Location:index.php");
}
else
echo $sql;



?>