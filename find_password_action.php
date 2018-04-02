<?php
$username=$_POST['name'];
$telephone=$_POST['tel'];
$address=$_POST['address'];
$db = new PDO('mysql:host=localhost;dbname=library','root','123456');
$statement=$db->prepare('select * from admin where username=:username');
$statement->execute([':username'=>$username]);
$user=$statement->fetch();
if(empty($user)){
     
    echo "<script>alert('用户不存在！点击重新输入!'); history.go(-1);</script>";
     
}
else{
    if($telephone==$user['telephone'] and $address==$user['address']){
        //echo ""."<br>";
		echo "<script> alert('用户验证成功！用户密码为".$user['username']."密码为：".$user['password']."'); window.location.href='login.html';</script>";
        //echo "".$username."密码为：".$user['password']."<br>";
	    //header('refresh:3;url=login.html');
        //echo "<a href=\"login.html\">点击重新登录</a>";
    }
    else{
        echo "验证格式不对，请重新输入：";
    }
}
?>