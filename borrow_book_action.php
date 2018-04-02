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
        $result=$db->query('select * from users')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['user_id'])
                $flag=true;
        }
        if(!$flag) {
            
			echo "<script>alert('卡号不存在、借阅失败!'); history.go(-1);</script>";
	
           // echo " <a href=\"borrow_book.php\">返回借书界面</a>";
        }
        $a=false;
        $result=$db->query('select * from books where isDelete =0')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['book_id'])
                $a=true;
        }
        if(!$a) {
            //echo "书籍编号不存在、借阅失败" . "<br>";
			 echo "<script>alert('书籍编号不存在、借阅失败!'); history.go(-1);</script>";

            //echo " <a href=\"borrow_book.php\">返回借书界面</a>";
        }

        $b=false;
        $statement= $db->prepare('select * from books where id=:id and isDelete=0');
        $statement->execute([':id'=>$_POST['book_id']]);
        $result =$statement->fetch();
        if(!$result['status']) {
            //echo "书籍不在库、借阅失败" . "<br>";
			echo "<script>alert('书籍不在库、借阅失败!'); history.go(-1);</script>";
             
        }
        else
            $b=true;
        if($flag and $a and $b) {
            $time = time();
            $time += (24 * 60 * 60 * 7);
            //echo "借阅成功！请在" . date('Y-m-d', $time) . "之前归还！\n";
			echo "<script> alert('借阅成功！请在".date('Y-m-d', $time)."之前归还 '); window.location.href='admin.php';</script>";

           // echo " <a href=\"index.php\">返回主界面</a>";
			
            $statement = $db->prepare('insert into record ( usersid, booksid, borrowtime,returntime, status) values (:user,:book,:borrowtime,:returntime,:status)');
            $statement->execute([':user' => $_POST['user_id'], ':book' => $_POST['book_id'], ':borrowtime' => date('Y-m-d'), ':returntime' => null, ':status' => '0']);
            $statement= $db->prepare('update books set status=:status where id=:id ');
            $statement->execute([':id'=>$_POST['book_id'], ':status'=>'0']);
       
	   }
        ?>
    </div>
</div>
</body>
</html>
