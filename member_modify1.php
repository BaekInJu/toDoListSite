<?php
    include 'check_session.php';
    $id = $_SESSION['id'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];

    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $email = $email1.'@'.$email2;

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql    = "UPDATE members SET pass='$pass', name='$name', email='$email' WHERE id = '$id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    unset($_SESSION['id']);
?>
<script>
    alert("변경 완료.");
    alert("다시 로그인 해주세요.");
    location.href = "index.php";
</script>