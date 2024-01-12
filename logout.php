<?php
    session_start();
    unset($_SESSION["id"]);
?>
<script>
    alert("로그아웃되었습니다.");
    location.href = "index.php";
</script>