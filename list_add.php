<?php
    $title = $_POST['title'];
    $memo = $_POST['memo'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    date_default_timezone_set('Asia/Seoul');
    $regist_day = date("Y-m-d (H:i)");

    session_start();
    $userName = $_SESSION['id'];
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "insert into toDoList(id, title, memo, date, time, regist_day)";
    $sql .="values ('$userName', '$title', '$memo', '$date', '$time', '$regist_day')";

    mysqli_query($con, $sql);
    mysqli_close($con);  
?>
<script>
    location.href = 'main.php';
</script>