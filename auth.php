<?php
session_start();
if(empty($_SESSION['user'])and empty($_SESSION['userid'])){
    echo "<script>alert('未登录!'); history.go(-1);</script>";
    //exit;
}