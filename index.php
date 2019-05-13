<?php 
    session_start(); 
    require("includes/connection.php"); 
    if(isset($_GET['pagina'])){      
        $paginas=array("productos", "carrito");      
        if(in_array($_GET['pagina'], $paginas)) {         
            $_pagina=$_GET['pagina'];           
        }else{            
            $_pagina="productos";             
        }          
    }else{         
        $_pagina="productos";  
    } 
?>
<!DOCTYPE html> 
<html lang="es">
<meta charset="UTF-8">  
<head> 
    <link rel="stylesheet" href="css/style.css"/>  
    <title>Carrito de compras</title> 
</head> 
<body>     
    <div id="container"> 
        <div id="main"> 
             <?php require($_pagina.".php"); ?>
        </div>
    </div>
</body> 
</html>