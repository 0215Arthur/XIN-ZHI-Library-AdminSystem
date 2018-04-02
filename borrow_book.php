 
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
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link   rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="admin.html">XIN知图书</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">   <a href="logout.php" class="btn btn-danger square-btn-adjust">退出</a> </div>
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
                        <a  href="select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>
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
                        <a  class="active-menu"  href="borrow_book.php"><i class="fa fa-bolt fa-3x"></i> 借书</a>
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
                     <h2>管理员后台</h2>   
                        <h5><?php include 'info.php'?> 欢迎登陆 </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				   <div class="row">
                <div class="col-md-12">

                   <div class="panel panel-default">
                        <div class="panel-heading">
                            当前业务
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>输入书籍信息</h3>
                                      <form action="borrow_book_action.php" method="POST">
                                        <div class="form-group">
                                            <label>用户卡号</label>
											
                                            <input type="text" name="user_id" class="form-control" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>书籍编号</label>
											 
                                            <input type="text" name="book_id" class="form-control" />
                                           
                                        </div>
                                         
                                        <button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>

                                    </form>
                                    <br />
                                    
                                 
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->	
            </div>
             
              		 
        </div>
                 
		 <!-- /. ROW  -->
         
                  
                 <!-- /. ROW  -->
            
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
 
 