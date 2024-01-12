<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/member.css">
    <script>
        function check(){
            if(document.getElementById("Id").value === ""){
                alert("아이디를 입력하세요.");
                return;
            }
            if((document.getElementById("pass").value === "") || (document.getElementById("passCheck").value === "")){
                alert("비밀번호를 입력하세요.");
                return;
            }
            if(document.getElementById("pass").value !== document.getElementById("passCheck").value){
                alert("비밀번호가 일치하지 않습니다.");
                return;
            }
            if(document.getElementById("Name").value === ""){
                alert("이름을 입력하세요.");
                return;
            }
            if((document.getElementById("tel1").value === "") ||
               (document.getElementById("tel2").value === "") ||
               (document.getElementById("tel3").value === "")
            ){
                alert("전화번호를 입력하세요.");
                return;
            }
            document.member_form.submit();
        }
        function check_id(){
            window.open("check_id.php?Id=" + document.getElementById("Id").value,"IDcheck",
            "left=700, top=300,width=350, height=200, scrollbars=no, resizable=yes");
        }
    </script>
</head>
<body>
    <div class="form">
        <h2>회원가입</h2>
        <form name="member_form" method="post" action="info.php">
            <div class="form_id">
                <div>아이디</div>
                <div><input type="text" id="Id" name="Id"></div>
                <div class="check_id"><input type="button" onClick="check_id()" value="중복확인"></div>
            </div>
            <div class="form_pass">
                <div>비밀번호</div>
                <div><input type="password" id="pass" name="pass"></div>
            </div>
            <div class="form_pass_check">
                <div>비밀번호 확인</div>
                <div><input type="password" id="passCheck"></div>
            </div>
            <div class="form_name">
                <div>이름</div>
                <div><input type="text" id="Name" name="Name"></div>
            </div>
            <div clas="form_phone">
                <div>핸드폰</div>
                <div id="phone"><input type="tel" size="3" id="tel1" name="tel1">-<input size="4" type="tel" id="tel2" name="tel2">-<input size="4"type="tel" id="tel3" name="tel3"></div>
            </div>
            <div class="form_Email">
                <div>이메일</div>
                <div class="email"><input type="text" id="email1" name="email1">@<input type="text" id="email2" name="email2"></div>
            </div>
            <input type="button" value="제출" onClick="check()">
        </form>
        <br>
        <a href='index.php'><button>첫화면</button></a>
    </div>
    <?php
        
    ?>
</body>
</html>