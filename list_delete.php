<?php
    $num = $_GET["num"];
    
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql    = "DELETE FROM toDoList WHERE num = '$num'";
    mysqli_query($con, $sql);
    mysqli_close($con);
?>
<script>
    alert("삭제 완료");
    location.href = "main.php";
</script>