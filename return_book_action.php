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
        $result=$db->query('select * from users where isDelete=0')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['user_id'])
                $flag=true;
        }
        if(!$flag) {
            echo "卡号不存在、还书失败" . "<br>";
            echo "<a href=\"return_book.php\">返回还书界面</a>";
        }
        $a=false;
        $result=$db->query('select * from books where isDelete =0')->fetchAll();
        foreach($result as $value){
            if($value['id']==$_POST['book_id'])
                $a=true;
        }
        if(!$a) {
			echo "<script>alert('书籍编号不存在、还书失败！'); history.go(-1);</script>";

            //echo "书籍编号不存在、还书失败" . "<br>";
            //echo "<a href=\"return_book.php\">返回还书界面</a>";
        }
        $b=false;
        $statement= $db->prepare('select * from books where id=:id and isDelete=0 ');
        $statement->execute([':id'=>$_POST['book_id']]);
        $result =$statement->fetch();
        if($result['status']) {
			echo "<script>alert('书籍已在库、还书失败！'); history.go(-1);</script>";

           // echo "书籍已在库、还书失败" . "<br>";
           // echo "<a href=\"return_book.php\">返回还书界面</a>";
        }
        else
            $b=true;
        if($flag and $a and $b) {
            $statement= $db->prepare('select * from record where usersid=? AND status=0');
            $statement->execute(array($_POST['user_id']));
            $result =$statement->fetch();
            if($result['booksid']==$_POST['book_id']) {
                //echo "还书成功，欢迎再来！";
				 echo "<script>alert('还书成功，欢迎再来！');window.location.href='admin.php';</script>";

                
                $status = 1;
                $returntime = date('Y-m-d');
                $id = $_POST['user_id'];
                $book = $_POST['book_id'];
                $db->exec("update record set returntime=' $returntime',status=$status where usersid = $id and booksid = $book");
                $statement = $db->prepare('update books set status=:status where id=:id and isDelete=0 ');
                $statement->execute([':id' => $_POST['book_id'], ':status' => '1']);
            }
            else{
				 echo "<script>alert('该用户未借此书，请归还本人所借书的编号！');history.go(-1);</script>";

               // echo "该用户未借此书，请归还本人所借书的编号".'<br>';
                //echo "<a href=\"return_book.php\">返回还书界面</a>";
            }
        }
        ?>

    </div>
</div>
</body>
</html>