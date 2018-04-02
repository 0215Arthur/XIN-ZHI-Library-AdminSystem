<?php
session_start();

if(empty($_SESSION['userid'])){
    echo "error!";
}
else {
    echo $_SESSION['userid'];
}