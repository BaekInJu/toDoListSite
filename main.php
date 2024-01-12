<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <script>
        function check() {
            if (document.getElementById("title").value == '') {
                alert("할일을 입력해 주세요");
                return;
            }
            document.list_form.submit();
        }
    </script>
</head>
<body>
    <h1 id="clock"></h1>
    <?php
    include 'check_session.php';
    $id = $_SESSION["id"];
    $con = mysqli_connect("localhost", "user1", "12345", "project");

    $sql    = "select * from members where id = '$id'";
    $result = mysqli_query($con, $sql);
    $row     = mysqli_fetch_array($result);
    $userName = $row['name'];
    //우측상단에 이름을 표시하기 위한 sql
    ?>
    <div class="hi">
        안녕하세요 <?= $userName ?>님!
        <a href="member_modify.php">내정보</a>
        <a href="logout.php">로그아웃</a>
    </div>
    <div class="add_list">
        할일추가
        <form name="list_form" action="list_add.php" method="post">
            <ul>
                <li>제목<input type="text" name="title" id="title"></li>
                <li>메모<input type="text" name="memo" id="memo"></li>
                <li>기간<input type="date" name="date" id="date"></li>
                <li>시간<input type="time" name="time" id="time"></li>
                <li><input type="button" onClick="check()" value="추가"></li>
            </ul>
        </form>
    </div>
    <div>
        할일들
        <?php
        $sql = "SELECT COUNT(*) AS total FROM toDoList WHERE id='$id'";
        //id에 일치하는 리스트의 갯수를 total의 이름으로 저장힙니다.
        $result = mysqli_query($con, $sql);
        //result에는 실제 갯수가 저장되는것이 아니라 결과의 객체가 저장된다.
        $row = mysqli_fetch_assoc($result);
        //이렇게 하므로써 실제 갯수가 $row에 저장된다.
        $totalTodos = $row['total'];

        $perPage = 5; // 페이지당 표시할 할일 개수
        $totalPages = ceil($totalTodos / $perPage); // 전체 페이지 수 계산
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // 현재 페이지 번호 (GET 매개변수로 전달됨)
        $start = ($page - 1) * $perPage; // 페이지에서 시작할 인덱스
        $end = $start + $perPage; // 페이지에서 끝날 인덱스

        $sql = "SELECT * FROM toDoList WHERE id='$id' ORDER BY CASE WHEN date IS NULL THEN 0 ELSE 1 END, date ASC LIMIT $start, $perPage";
        $result = mysqli_query($con, $sql);
        //$start와 $end를 기준으로 리스트를 잘라서 출력합니다.

        date_default_timezone_set('Asia/Seoul');
        //시간을 한국시간대로 설정합니다.

        while ($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $date = $row['date'];
            $num = $row['num'];
            $time = $row['time'];
            $memo = $row['memo'];

            $currentDate = date("Y-m-d"); // 현재 날짜
            $diff = strtotime($date) - strtotime($currentDate); // 날짜 차이 계산 (초 단위)
            //d-day를 계산하기 위해 현재날짜에서 뺄셈을 합니다.

            // 초를 날짜로 변환
            $days = floor($diff / (60 * 60 * 24)); // 일 단위로 변환

            $D_day = '';

            if ($date != null) {
                $D_day = $days >= 0 ? "D-" . $days : "D+" . abs($days);
            }
            //date데이터가 없으면 D_day는 빈 문자열로 출력이 됩니다.

            ?>
            <ul>
                <li><button><a href="list_done.php?num=<?php echo $num ?>">완료</a></button></li>
                <?php if ($D_day != '') { ?>
                    <li><?= $D_day ?></li>
                <?php } ?>
                <li><?= $time ?></li>
                <li><?= $title ?></li>
                <li><?= $memo ?></li>
                <li><button><a href="list_modify.php?num=<?php echo $num ?>">수정</a></button></li>
            </ul>
        <?php
        }
        ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href='main.php?page=<?php echo $i ?>'><?php echo $i ?></a>
        <?php } ?>

        <?php mysqli_close($con); ?>
    </div>

    <script src="clock.js"></script>
</body>
</html>
