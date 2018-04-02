<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>XIN知图书</title>
    
</head>
<body>
 
        <?php
        $username=$_POST['id'];
        $password=$_POST['u_password'];
        $db = new PDO('mysql:host=localhost;dbname=library','root','123456');
        $statement=$db->prepare('select * from users where id=:username and isDelete =0');
        $statement->execute([':username'=>$username]);
        $user=$statement->fetch();
        if(empty($user)){
             
			echo "<script>alert('用户不存在！请重新登录'); history.go(-1);</script>";
     
        }
        else if($password != $user['password']){
             
			echo "<script>alert('密码不正确！'); history.go(-1);</script>";
			}
        else{
            $_SESSION['userid']=$username;
            
			echo "<script>alert('登录成功!进入选择业务主页');window.location.href='user.php';</script>";
			//header('refresh:1;url=home.html');  
           // echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
        ?>
 
</body>
</html>
