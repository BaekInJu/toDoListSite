<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="css/member_modify.css">
	<script>
		function check(){
            if((document.getElementById("pass").value === "") || (document.getElementById("passCheck").value === "")){
                alert("비밀번호를 입력하세요.");
                return;
            }
            if(document.getElementById("pass").value !== document.getElementById("passCheck").value){
                alert("비밀번호가 일치하지 않습니다.");
                return;
            }
            if(document.getElementById("name").value === ""){
                alert("이름을 입력하세요.");
                return;
            }
            if((document.getElementById("email1").value === "") ||
               (document.getElementById("email2").value === "")
            ){
                alert("이메일을 입력하세요.");
                return;
            }
            document.modify_form.submit();
		}

		function del() {
			var confirmDelete = confirm("계정을 삭제하시겠습니까?");
			if (confirmDelete) {
				window.location.href = "member_delete.php";
			} else {
				window.location.href = "main.php";
			}
		}
	</script>
</head>
<body>
	<?php
		include 'check_session.php';
		$id = $_SESSION['id'];
		$con = mysqli_connect("localhost", "user1", "12345", "project");
		$sql    = "select * from members where id='$id'";
		$result = mysqli_query($con, $sql);
		$row    = mysqli_fetch_array($result);

		$pass = $row["pass"];
		$name = $row["name"];

		$email = explode("@", $row["email"]);
		$email1 = $email[0];
		$email2 = $email[1];

		mysqli_close($con);
	?>
	<div id="join_box">
		<form  name="modify_form" method="post" action="member_modify1.php?id=<?=$id?>">
			<h2>회원 정보수정</h2>
			<div class="form id">
				<div class="col1">아이디</div>
				<div class="col2">
					<input type="text" value="<?=$id?>" disabled>
					
				</div>                 
			</div>
			<div class="clear"></div>

			<div class="form">
				<div class="col1">비밀번호</div>
				<div class="col2">
					<input type="password" name="pass" id="pass" value="<?=$pass?>">
				</div>                 
			</div>
			<div class="clear"></div>
			<div class="form">
				<div class="col1">비밀번호 확인</div>
				<div class="col2">
					<input type="password" name="pass_confirm" id="passCheck" value="<?=$pass?>">
				</div>                 
			</div>
			<div class="clear"></div>
			<div class="form">
				<div class="col1">이름</div>
				<div class="col2">
					<input type="text" name="name" id="name" value="<?=$name?>">
				</div>                 
			</div>
			<div class="clear"></div>
			<div class="form email">
				<div class="col1">이메일</div>
				<div class="col3">
					<input type="text" name="email1" id="email1" value="<?=$email1?>">@<input 
							type="text" name="email2" id="email2" value="<?=$email2?>">
				</div>                 
			</div>
			<div class="clear"></div>
			<div class="bottom_line"> </div>
			<div class="buttons">
				<input id = "submit_button" type="button" onclick="check()" value="변경">
				<input type="button" onClick="del()" value="계정 삭제">
				<button><a href="main.php">뒤로가기</a></button>
			</div>
		</form>
	</div>
</body>
</html>