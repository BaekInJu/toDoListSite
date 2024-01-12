<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <script>
        function check() {
            if(document.getElementById("Id").value == ''){
                alert("아이디를 입력하세요");
                return;
            }
            if(document.getElementById("pass").value == ''){
                alert("비밀번호를 입력하세요");
                return;
            }
            document.login_form.submit();
        }
    </script>
</head>
<body>
    <div class="form">
        <h2>로그인</h2>
        <div>
            <table>
                <form name="login_form" method="post" action="check_login.php">
                    <tr>
                        <td><input type="text" id="Id" name="Id"></td>
                    </tr>
                    <tr>
                        <td><input type="password" id="pass" name="pass"></td>
                    </tr>
                    <tr>
                        <td class="login-button" colspan="2"><input type="button" value="로그인" onClick="check()"></td>
                    </tr>
                </form>
            </table>
        </div>
        <br>
        <div class="Id">
            <a href="member.php">회원가입</a>
            <a href="find_acc.php">아이디/비밀번호 찾기</a>
        </div>
    </div>
</body>
</html>
</html>