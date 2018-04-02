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
                <a class="navbar-brand" href="admin.php">XIN知图书</a> 
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
                        <a class="active-menu"  href="admin.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
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
                        <a   href="borrow_book.php"><i class="fa fa-bolt fa-3x"></i> 借书</a>
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
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				<?php
              
              $db = new PDO('mysql:host=localhost;dbname=library','root','123456');
              $result=$db->query('select count(*) as num from books where isDelete=0');
			  
				?>
                <div class="text-box" >
                     <?php
					if($result)
					{  $booknum=$result->fetch();
					 echo '<p class="main-text">'.$booknum['num'].'本</p>';	
					}
					else
						 echo '<p class="main-text">0本</p>';
                   
                         ?>                
				<p class="text-muted">馆藏图书</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                     <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from admin");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'名</p>';
			   }
               else 
				   echo '<p class="main-text">0名</p>';
                         ?>                
				<p class="text-muted">管理员</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                      <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from record where status=0");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'条</p>';
			   }
               else 
				   echo '<p class="main-text">0条</p>';
                         ?>                
				<p class="text-muted">未还图书</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                      <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from users where isDelete=0");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'条</p>';
			   }
               else 
				   echo '<p class="main-text">0条</p>';
                         ?>                
				<p class="text-muted">借阅记录</p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">           
                    
			 <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				 
                <div class="text-box" >
                     <?php
					   $result=null;
			  $result=$db->query("select count(usersid) as num from record where status=0");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'名</p>';
			   }
               else 
				   echo '<p class="main-text">0名</p>';
                         ?>                
				<p class="text-muted">用户未归还图书</p>
                </div>
             </div>
			 
		     </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">           
                    
			 <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				 
                <div class="text-box" >
                     <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from books where status=1 and isDelete=0");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'本</p>';
			   }
               else 
				   echo '<p class="main-text">0本</p>';
                         ?>                
				<p class="text-muted">图书在库</p>
                </div>
             </div>
			 
		     </div>   
           <div class="col-md-6 col-sm-6 col-xs-6">           
                    
			 <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				 
                <div class="text-box" >
                     <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from users where  isDelete=0");
			   if($result)
			   {
				    $recordnum=$result->fetch();
                    echo '<p class="main-text">'.$recordnum['num'].'名</p>';
			   }
               else 
				   echo '<p class="main-text">0本</p>';
                         ?>                
				<p class="text-muted">用户</p>
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
 