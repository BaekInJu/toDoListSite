<?php
    include 'check_session.php';
    $id = $_SESSION['id'];
    $num = $_GET['num'];
    $title = $_POST['title'];
    $memo = $_POST['memo'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql    = "UPDATE toDoList SET title='$title', memo='$memo', date='$date', time='$time' WHERE num = '$num' and id='$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
?>
<script>
    alert("변경 완료.");
    location.href = "main.php";
</script>