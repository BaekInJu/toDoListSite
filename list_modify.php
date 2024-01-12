<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/list_modify.css">
    <script>
        function check(){
            if(document.getElementById("title").value == ''){
                alert("제목을 입력하세요.");
                return;
            }
            document.list_modify.submit();
        }
    </script>
</head>
<body>
    <?php
        include 'check_session.php';
        $num = $_GET['num'];
        $con = mysqli_connect("localhost", "user1", "12345", "project");
        $sql    = "select * from toDoList where num='$num'";
        $result = mysqli_query($con, $sql);
        $row    = mysqli_fetch_array($result);

        $title = $row["title"];
        $memo = $row["memo"];
        $date = $row['date'];
        $time = $row['time'];

        mysqli_close($con);
        
    ?>
    <div>
        <form name="list_modify" action="list_modify1.php?num=<?=$num?>" method="post" class="i">
            <div>
                제목
                <input type="text" name="title" id="title" value="<?=$title?>">
            </div>
            <div>
                메모
                <input type="text" name="memo" value="<?=$memo?>">
            </div>
            <div>
                기간
                <input type="date" name="date" value="<?=$date?>">
            </div>
            <div>
                시간
                <input type="time" name="time" value="<?=$time?>">
            </div>
            <div>
                <input type="button" value="변경" onClick="check()">
                <button><a href="list_delete.php?num=<?=$num?>">삭제</a></button>
                <button><a href="main.php">뒤로가기</a></button>
            </div>
        </form>
    </div>
</body>
</html>