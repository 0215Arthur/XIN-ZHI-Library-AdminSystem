<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XIN知图书</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
try {
    $dsn = 'mysql:dbname=library;host=localhost';
    $user = 'root';
    $password = '123456';
    $db = new PDO($dsn, $user, $password);
    $result = $db->query('SELECT * FROM record')->fetchAll();
}   catch(PDOException $e){
    die('程序出错');
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>用户卡号</th>
                    <th>书本编号</th>
                    <th>借书时间</th>
                    <th>还书时间</th>
                    <th>借阅状态</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($result as $value){
                    echo '<tr class= "info">';
                    echo "<td>".$value['id']."</td>";
                    echo "<td>".$value['usersid']."</td>";
                    echo "<td>".$value['booksid']."</td>";
                    echo "<td>".$value['borrowtime']."</td>";
                    echo "<td>".$value['returntime']."</td>";
                    if($value['status']==1)
                        echo "<td>".'在库'."</td>";
                    else
                        echo "<td>".'借出'."</td>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li ><a href="#">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>


<div class="container-fluid">

    <div class="btn-group" role="group" aria-label="...">
        <div class="col-md-12"></div> <a href="admin.php"> <button type="button" class="btn btn-default">返回主页</button></a></div>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js" ></script>

</body>
</html>
