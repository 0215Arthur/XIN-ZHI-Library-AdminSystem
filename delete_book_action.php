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
        $result=$db->query('select * from books where isDelete =0')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['id'])
                $flag=true;
        }
        if(!$flag) {
            //echo "图书编号不存在，无法删除！" . "<br>";
			echo "<script>alert('图书编号不存在，无法删除！'); history.go(-1);</script>";
            //echo "<a href=\"delete_book.php\">返回删书界面</a>";
			exit;
        }
        $a=false;
        $statement= $db->prepare('select * from books where id=:id and isDelete=0');
        $statement->execute([':id'=>$_POST['id']]);
        $result =$statement->fetch();
        if(!$result['status']) {
            //echo "书籍不在库、无法删除！" . "<br>";
			 echo "<script>alert('书籍不在库、无法删除！'); history.go(-1);</script>";
             exit;
           // echo " <a href=\"delete_book.php\">返回删书界面</a>";
        }
        else
            $a=true;
        if($flag and $a) {
            $statement = $db->prepare('update  books set isDelete =1 WHERE id=:id and status=:status and isDelete =0');
            $result = $statement->execute([':id' => $_POST['id'], ':status' => 1]);
            if ($result) {
                 
				echo "<script>alert('删书成功！');window.location.href='admin.php';</script>";
                
            }
        }
        ?>
    </div>
</div>
</body>
</html>
