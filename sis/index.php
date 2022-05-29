<?php 
 
ob_start();
session_start();
if(!isset($_SESSION['admin_login']) && $_SESSION['admin_login'] ="successful"){
    header("Location:admin.php");
}
require_once ("config/config.php");
require_once ("config/query.php");

$url=isset($_GET['url']) ? $_GET['url'] :'index';

$url=str_replace('.php', '', $url);

$url.='.php';

$pagePath=root('//'.$url);

require_once root('includes/header.php');

if(file_exists($pagePath) && is_file($pagePath)){
	
if(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != 'successful'){
    header('Location:admin.php?plsentercorrectinfo');
}


	require_once $pagePath;
}else {
	
	echo "<h1>Page not found 404</h1>";
}
require_once root('includes/footer.php');

?>
 <!-- if(!empty($_POST)){
//     $subject = $obj->Select("tbl_subject","*","pid",$_POST['proname']);
    
//     foreach($subject as $s){
//        echo '<option value="'.$s["subid"].'">'.$s["sname"].'</option>';
//     }

   
// }
?>