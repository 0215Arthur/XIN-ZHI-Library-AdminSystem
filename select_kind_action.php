<?php
include ('auth.php');

?>
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">XIN知图书</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                       <img src="assets/img/find_user.png" class="user-image img-responsive"/>
			   </li>
				
					
                    <li>
                        <a  href="admin.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
                    </li>
                     <li>
                        <a  class="active-menu" href="select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>
                    </li>
                    <li>
                        <a  href="make_card.php"><i class="fa fa-qrcode fa-3x"></i> 办卡</a>
                    </li>
						   <li  >
                        <a   href="delete_card.php"><i class="fa fa-bar-chart-o fa-3x"></i>注销</a>
                    </li>	
                      <li  >
                        <a  href="add_book.php"><i class="fa fa-table fa-3x"></i>添书</a>
                    </li>
                    <li  >
                        <a  href="delete_book.php"><i class="fa fa-edit fa-3x"></i> 删书 </a>
                    </li>				
					 <li  >
                        <a    href="borrow_book.php"><i class="fa fa-bolt fa-3x"></i> 借书</a>
                    </li>	
                     <li  >
                        <a   href="return_book.php"><i class="fa fa-laptop fa-3x"></i>还书</a>
                    </li>	
					
		 
				
				 
               
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>图书库</h2>   
                        <h5>Study everyday everywhere</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
           <?php
try {
    $dsn = 'mysql:dbname=library;host=localhost';
    $user = 'root';
    $password = '123456';
    $db = new PDO($dsn, $user, $password);
	$db->query('set names utf8_unicode_ci');

    $statement= $db->prepare('select * from books where kind like ? and isDelete=0');
   // $statement->execute([':author'=>$_POST['author']]);
   $statement->execute(array("%".$_POST['kind']."%"));
    $result =$statement->fetchAll();
}   catch(PDOException $e){
    die('程序出错');
}
?> 
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
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
                        echo "<td>".'借出'."</td>";
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
                <!-- /. ROW  -->
         
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

 