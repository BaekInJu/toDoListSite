<?php
    $Name = $_GET["Name"];
    $tel = $_GET["tel"];

    
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select * from members where name='$Name' and phone_num='$tel'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if($num){
        echo "아이디: ".$row['id'];
    }
    else{
        echo "해당 계정이 없습니다.";
    }
?>