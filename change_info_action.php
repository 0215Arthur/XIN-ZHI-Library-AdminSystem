<?php
include 'auth.php';
$userid=$_POST['id'];
$telephone=$_POST['tel'];
$pwd_1=$_POST['pwd_1'];
$pwd_2=$_POST['pwd_2'];
$db = new PDO('mysql:host=localhost;dbname=library','root','123456');
$statement=$db->prepare('select * from users where id=:userid and isDelete=0');
$statement->execute([':userid'=>$userid]);
$user=$statement->fetch();
if(empty($user)){
     
	echo "<script>alert('用户不存在！'); history.go(-1);</script>";
     
}
else{
    if($pwd_1==$pwd_2){
		$statement=$db->prepare('update users set password = ? ,telephone =? where id = ? and isDelete =0');
        $statement->execute(array($pwd_1,$telephone,$userid));
        echo "<script>alert('修改成功！'); history.go(-1);</script>";
    }
    else{
        echo "<script>alert('密码不一致！'); history.go(-1);</script>";
    }
}
?>