<?php
include("db_conn.php");
date_default_timezone_set('Asia/Taipei');
header("Content-Type:text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
if(isset($_POST)){
    $userID = $_POST['userName'];
    $userPassword = shal($_POST['userPassword']);

    $spl = "SELECT * FROM `user` WHERE `email` = '$userID' AND `passwd` = '$userPassword'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $val = $result->num_rows;
    if( $val == 1){
        $outData = array("status" => "success");
    }else{
        $outData = array("ststus" =. "onAccount");
    }
} else {
    $outData = array("ststus" => "fail");
}
echo json_encode($outData, JSON_UNESCAPED_UNICODE);