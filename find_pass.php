<?php
    $Id = $_GET["Id"];
    
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select * from members where id='$Id'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if($num){
        echo "비밀번호 : ".$row['pass'];
    }
    else{
        echo "해당 계정이 없습니다.";
    }
?>