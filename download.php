<?php

   $filepath = "pages/data/transacciones.json";

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            die();
        } else {
          echo '<h1><center>Ha ocurrido un error</center></h1>';
	        die();
        }
        header('Location: ../index.php');
        exit();

?>

?>
