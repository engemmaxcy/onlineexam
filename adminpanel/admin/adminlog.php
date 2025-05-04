<?php 
session_start();
 include("../../conn.php");
 

extract($_POST);
$sql = "SELECT * FROM admin_acc WHERE admin_user='$username' AND admin_pass='$pass'  ";

$check = $conn->query($sql);

if($check->rowCount() > 0){
    $_SESSION['admin']['adminnakalogin'] = true;
    $resp['status'] = 'success';
    $resp['msg']  = 'login success'; 
}else{
    $resp['status'] = 'failed';
    $resp['msg']  = 'login failed'; 
}
echo json_encode($resp);