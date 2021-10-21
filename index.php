<?php
include('header.php');
?>

<h1>Danh sách những người hiến máu</h1>
<a href="add_person.php"><button type="button" class="btn btn-primary">Thêm</button></a>
<?php
//Quy trình 4(3) bước: (truy vấn select)
    //b1: Kết nối tới database server
    $conn = mysqli_connect('localhost', 'root', '', 'quanlinganhangmau','3306');
    if(!$conn){
        die("Kết nối không thành công");
    }

    //Bước 2: Thực hiện truy vấn
    $sql ="Select * from blood_donor";
    $result = mysqli_query($conn, $sql);

    //Bước 3: Xử lý kết quả truy vấn của lệnh Select
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Mã người hiến máu</th>";
    echo "<th>Tên người hiến</th>";
    echo "<th>Giới tính</th>";
    echo "<th>Năm sinh</th>";
    echo "<th>Nhóm máu</th>";
    echo "<th>Ngày đăng kí</th>";
    echo "<th>Số điện thoại</th>";
    echo"<th>Sửa</th>";
    echo"<th>Xóa</th>";
    echo "</tr>";

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['bd_id']."</td>";
            echo "<td>".$row['bd_name']."</td>";
            if($row['bd_sex']=='1')
            echo "<td>Nam</td>";
            else
            echo "<td>Nữ</td>";
            echo "<td>".$row['bd_age']."</td>";
            echo "<td>".$row['bd_bgroup']."</td>";
            echo "<td>".$row['bd_reg_date']."</td>";
            echo "<td>".$row['bd_phno']."</td>";
            $id = $row['bd_id'];
            echo'<td><a href="sua.php?id=<?'.$row['bd_id'].'; ?>"><button type="button" class="btn btn-success">Sửa</button></a></td>';
            echo'<td><a href="delete.php?id='.$id.'"><button type="button" class="btn btn-success">Xóa</button></a></td>';
            echo "<tr>";

        }
    }

    echo "</table>";

    //Bước 4: Đóng kết nối
    mysqli_close($conn);
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

