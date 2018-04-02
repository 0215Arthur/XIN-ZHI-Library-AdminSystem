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
        $db = new PDO('mysql:host=localhost;dbname=library','root','123456');
        $str=$db->query("select * from users ");
        $result = $str->fetchAll(PDO::FETCH_ASSOC);
        $flag=false;
        foreach($result as $value){
            if($value['id'] == $_POST['id']){
				 echo "<script>alert('卡号已存在!请重新输入'); history.go(-1);</script>";

                //echo "学号已存在!请重新输入："."<br>";
                //echo "<a href=\"make_card.php\">返回办卡页面</a>";
                }
            else
               $flag=true;
        }
        if($flag){
            $statement = $db->prepare('insert into users(id,name,sex,password,telephone,isDelete) values (?,?,?,"123456",?,0)');
            $result = $statement->execute(array($_POST['id'],  $_POST['username'], $_POST['sex'], $_POST['telephone']));
            if ($result) {
				// echo "<script>alert('卡号已存在!请重新输入'); history.go(-1);</script>";
				echo "<script> alert('办卡成功！您的卡号为".$_POST['id']." '); window.location.href='admin.php';</script>";
                exit;
          //echo "办卡成功！"."&nbsp;";
            //    echo "您的卡号为：".$_POST['id']."<br>";
              //  echo "<a href=\"index.php\">返回主页面</a>";
            }
            else{
			 echo "<script>alert('输入格式不对，请重新输入'); history.go(-1);</script>";
			 exit;
           // $db=mull;
                //echo "输入格式不对，请重新输入："."<br>";
                //echo "<a href=\"make_card.php\">返回办卡页面</a>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
