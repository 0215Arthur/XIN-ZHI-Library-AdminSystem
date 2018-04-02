<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
  </head>
<body>
<div id="all">
    <div class="method">
         <?php
        $flag=false;
        $db = new PDO('mysql:host=localhost;dbname=library','root','123456');
        $result=$db->query('select * from users where isDelete =0')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['id'])
                $flag=true;
        }
        if(!$flag) {
           // echo "卡号不存在，无法删除！" . "<br>";
			 echo "<script>alert('卡号不存在，无法删除！'); history.go(-1);</script>";

            //echo "<a href=\"delete_book.php\">返回注销界面</a>";
			exit;
        }
        $a=false;
        $statement= $db->prepare('select * from users where id=:id and isDelete=0');
        $statement->execute([':id'=>$_POST['id']]);
        $result =$statement->fetch();
        $a=true;
        if($flag and $a) {
            $statement = $db->prepare('update  users set isDelete =1 WHERE id=:id and isDelete =0');
            $result = $statement->execute([':id' => $_POST['id']]);
            if ($result) {
				 echo "<script>alert('注销成功！');window.location.href='admin.php';</script>";
 
            }
        }
        ?>
    </div>
</div>
</body>
</html>
