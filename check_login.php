<?php
    $inp_id = $_POST["Id"];
    $inp_pass = $_POST["pass"];

    session_start();
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select * from members where id='$inp_id'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if(!$num || $result == 0){
        echo '
        <script>
            alert("등록된 사용자가 아닙니다.");
            location.href = "index.php";
        </script>';
    }
    else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];
        if($db_pass != $inp_pass){
            echo '
            <script>
                alert("비밀번호가 다름니다.");
                location.href = "index.php";
            </script>';
        }
        else{
            $_SESSION["id"] = $row["id"];
            echo '
            <script>
                location.href = "index.php";
            </script>';
        }
    }
    
?>