<?php
function __autoload($classe) {
    
	$dir = str_replace("\\","/",dirname(__FILE__));
	if(file_exists($dir."/".$classe.".Classes.php")) {
		include($dir."/".$classe.".Classes.php");
	}
}

?>