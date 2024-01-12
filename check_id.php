<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>아이디 중복 확인</h3>
    <?php
        $inp_id= $_GET["Id"];
        if(!$inp_id){
            echo("아이디를 입력하세요.");
        }
        else{
            $con = mysqli_connect("localhost", "user1", "12345", "project");
            $sql = "select * from members where id='$inp_id'";
            $result = mysqli_query($con, $sql);
            $num_record = mysqli_num_rows($result);
            if($num_record){
                echo("아이디가 중복됩니다.");
                echo("<form action='member.php' method=POST>");
                echo("");
            }
            else{
                echo("사용 가능");
            }
            mysqli_close($con);
        }
    ?>
</body>
</html>