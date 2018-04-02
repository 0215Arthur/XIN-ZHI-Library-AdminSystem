<!DOCTYPE html>
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XIN知图书</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
<?php
    header("Content-Type:text/html;charset=utf-8"); 
if(isset($_POST['search']))	
{
	$wen=trim($_POST['wd']);
	if($wen=='')
	{
			echo "<script>alert('请输入搜索内容！'); history.go(-1);</script>";
    exit;
	}
	try {
    $dsn = 'mysql:dbname=library;host=localhost';
    $user = 'root';
    $password = '123456';
    $db = new PDO($dsn, $user, $password);
    //phpinfo();
	//echo phpinfo();
	//echo $_POST['wd'];
    $statement= $db->prepare('select distinct * from books where (author like ? or name like ?) and isDelete =0');
    //$statement->execute(array($_POST['wd']));
    $statement->execute(array("%".$_POST['wd']."%","%".$_POST['wd']."%"));
    $result =$statement->fetchAll();
}   catch(PDOException $e){
    die('程序出错');
	
	
}
	
}


 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
                        <div class="panel-heading">
                            检索结果
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                    <th>类别</th>
                    <th>书名</th>
                    <th>作者</th>
                    <th>价格</th>
					<th>出版社</th>
					<th>馆藏</th>
                    <th>状态</th>
                                           
										</tr>
                                    </thead>
                                    <tbody>
									
                                     <?php
                foreach($result as $value){
					 echo '<tr>';
                     echo "<td>".$value['id']."</td>";
					echo "<td>".$value['kind']."</td>";
                    echo "<td>".$value['name']."</td>";
                    echo "<td>".$value['author']."</td>";
                    echo "<td>".$value['price']."</td>";
                    echo "<td>".$value['press']."</td>";
					echo "<td>".$value['address']."</td>";
                    if($value['status']==1)
                        echo "<td>".'在库'."</td>";
                    else
                        echo "<td>".'可借'."</td>";
                     echo '</tr>';
				}
                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                
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
        <div class="col-md-12"></div> <a href="home.html"> <button type="button" class="btn btn-default">返回主页</button></a></div>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

</body>
</html>
