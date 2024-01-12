<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/find_acc.css">
    <script>
        function check_id(){
            if(document.getElementById("Name").value == ""){
                alert("이름을 입력해 주세요.");
                return;
            }
            if(document.getElementById("tel1").value == "" || document.getElementById("tel2").value == "" || document.getElementById("tel3").value == ""){
                alert("핸드폰을 입력해 주세오.");
                return;
            }
            let tel = document.getElementById("tel1").value+""+document.getElementById("tel2").value+""+document.getElementById("tel3").value
            window.open("find_id.php?tel=" + tel+"&Name="+document.getElementById("Name").value,"find_id",
            "left=700, top=300,width=350, height=200, scrollbars=no, resizable=yes");
        }
        function check_pass(){
            if(document.getElementById("Id").value == ""){
                alert("아이디를 입력해 주세요.");
                return;
            }
            window.open("find_pass.php?Id=" + document.getElementById("Id").value,"find_pass",
            "left=700, top=300,width=350, height=200, scrollbars=no, resizable=yes");
        }
    </script>
</head>
<body>
    <h2>아이디 찾기</h2>
        <form name = "find_id" action="find_id.php" method="post">
            <div>
                <div>
                    이름
                    <input type="text" id="Name" name="Name">
                </div>
                <div class="form_phone">
                    핸드폰
                    <input type="tel" size="3" id="tel1" name="tel1">-<input size="4" type="tel" id="tel2" name="tel2">-<input size="4"type="tel" id="tel3" name="tel3">
                </div>
                <div>
                    <input type="button" value="제출" onClick="check_id()">
                </div>
            </div>
        </form>
    <h2>비밀번호 찾기</h2>
        <form name="find_pass" action="find_pass.php" method="post">
            <div>
                <div>
                    아이디
                    <input type="text" id="Id" name="Id">
                </div>
                <div>
                    <input type="button" value="제출" onClick="check_pass()">
                </div>
            </div>
        </form>
    <div>
        <button class="back"><a href="index.php">뒤로가기</a></button>
    </div>
</body>
</html>