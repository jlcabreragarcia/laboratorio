<?php

include('conexion.php');
conectar();

$dir=getcwd()."/FTP";

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if($file!="." && $file!=".." && substr($file,0,8)=='Examenes'){
				$xml = simplexml_load_file($dir.'/'.$file);

				foreach($xml->Examenes as $web){
					/*$query='DELETE FROM empresa WHERE CdEmpresa='.$web->CdEmpresa;
					mysql_query($query);
					
					
					$query='INSERT INTO empresa VALUES ('.$web->CdEmpresa.',"'.$web->RazonSocial.'","'.$web->Contrasena.'")';
					mysql_query($query);*/
				}
				unlink($dir.'/'.$file);
			}
        }
        closedir($dh);
    }else{
		echo "no abrio el dir";
	}
}else{
	@mkdir($dir);
}
?>