
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
                        <a class="active-menu"  href="user.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
                    </li>
                     <li>
                        <a  href="u_select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>
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
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				<?php
              $userid=$_SESSION['userid'];
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
			  $result=$db->query("select count(*) as num from record where usersid=".$userid."");
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
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
				
                      <?php
					   $result=null;
			  $result=$db->query("select count(*) as num from record where usersid=".$userid."and status=0");
              if($result)
			  {
				   $recordnum=$result->fetch();
				    echo '<p class="main-text">'.$recordnum['num'].'本</p>';
			  }
			 else
				 echo '<p class="main-text"> 0本</p>';
			  
                  
                         ?>                
				<p class="text-muted">图书未归还</p>
                </div>
             </div>
		     </div>
                
			</div>
                 <!-- /. ROW  -->
                <hr />                
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">           
			 
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
  