<?php 
//connect
$conn = mysqli_connect('localhost', 'root', '', 'quanlinganhangmau','3306');
if(!$conn){
    die("Kết nối không thành công");
}

//lấy id

$bd_id = $_GET['id'];

$sql = "delete from `blood_donor` where bd_id = $bd_id ";
$result = mysqli_query($conn, $sql);

if($result>0){
    header("Location: index.php");
}
else
echo $sql;

?>