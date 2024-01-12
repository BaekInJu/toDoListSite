<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["id"])){
    ?>
    <script>
        location.href = "login.php";
    </script>
    <?php
        }
        else{
    ?>
    <script>
        location.href = "main.php";
    </script>
    <?php
        }
    ?>
    
</body>
</html>