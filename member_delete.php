<?php
    include "check_session.php";
    $id = $_SESSION['id'];

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql    = "DELETE FROM members WHERE id = '$id'";
    mysqli_query($con, $sql);

    $sql    = "DELETE FROM toDoList WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    unset($_SESSION['id']);
?>
<script>
    alert("삭제 완료.");
    location.href = "index.php";
</script>
