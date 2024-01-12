<?php
    $Id = $_POST["Id"];
    $pass = $_POST["pass"];
    $Name = $_POST["Name"];
    $phone = $_POST["tel1"].$_POST["tel2"].$_POST["tel3"];
    $email = $_POST["email1"]."@".$_POST["email2"];
    $check_code = 0;
    date_default_timezone_set('Asia/Seoul');
    $regist_day = date("Y-m-d (H:i)");

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $check_id = "select * from members where id='$Id'";
    $result_id = mysqli_query($con, $check_id);
    $check_id = mysqli_num_rows($result_id);
    if($check_id > 0){
        echo'
        <script>
            alert("사용중인 아이디가 있습니다.");
            location.href = "member.php";
        </script>';
    }
    else{
        $sql = "insert into members(id, pass, name, phone_num, email, regist_day)";
        $sql .="values ('$Id', '$pass', '$Name', '$phone', '$email', '$regist_day')";

        mysqli_query($con, $sql);
        mysqli_close($con);
    }
?>
<script>
    alert("성공");
    location.href = "index.php";
</script>