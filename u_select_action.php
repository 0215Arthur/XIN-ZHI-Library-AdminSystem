 
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
                <a class="navbar-brand" href="user.php">XIN知图书</a> 
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
                        <a  href="user.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
                    </li>
                     <li>
                        <a class="active-menu"  href="u_select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>
                    </li>
                    <li>
                        <a  href="change_info.php"><i class="fa fa-qrcode fa-3x"></i> 修改个人信息</a>
                    </li>

					  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>用户主页</h2>   
                        <h5><?php include 'u_info.php'?> 欢迎登陆 </h5>
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
                                    <h3>书籍检索</h3>
                                            <form action="/u_select_name_book_action.php" method="post">
                                        <div class="form-group">
                                            <label>书籍名称</label>
											
                                            <input type="text" name="name" class="form-control" />
                                            
                                        </div>
										<button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>
										</form>
										<br/>
										<form action="/u_select_author_book_action.php" method="post">
                                        <div class="form-group">
                                            <label>作者姓名</label>
											 
                                            <input type="text" name="author" class="form-control" />
                                            
                                        </div>
                                         <button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>
                                        </form>
										<br/>
                                       <form action="/u_select_press_action.php" method="post">
                                        <div class="form-group">
                                            <label>出版社名称</label>
											
                                            <input type="text" name="press" class="form-control" />
                                            
                                        </div>
										<button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>
										</form>
                                     
                                    <br />
									<form action="/u_select_kind_action.php" method="post">
                                        <div class="form-group">
                                            <label>上架类别</label>
											
                                            <input type="text" name="kind" class="form-control" />
                                            
                                        </div>
										<button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>
										</form>
                                     <br/>
									<form action="/u_select_address_action.php" method="post">
                                        <div class="form-group">
                                            <label>馆藏位置</label>
											
                                            <input type="text" name="address" class="form-control" />
                                            
                                        </div>
										<button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button>
										</form>
                                 
    </div>
                                <div class="col-md-6">
                                    <h3>记录检索</h3>
                                    <form action="/u_select_single_user.php" method="post">
                                      
										 <div class="form-group">
                                            <label>用户ID</label>
											 
                                            <input type="text" name="book_id" disabled class="form-control" />
                                            
                                        </div>
										   <button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button> 
										</form>
										 <br/>
										 <form action="/u_select_single_book.php" method="post">
										 <div class="form-group">
                                            <label>书籍编号</label>
											 
                                            <input type="text" name="book" class="form-control" />
                                            
                                        </div>
                                              <button type="submit" class="btn btn-default">确认</button>
                                        <button type="reset" class="btn btn-primary">重置</button> 
                                            
                                         
                                       </form>
									    
									   
									   <br/>
										 
                     <!-- End Form Elements -->	
            </div>
              
                                
                            </div>
                        </div>
                    </div>
				     
              </div>		 
        </div>
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
 
  
 