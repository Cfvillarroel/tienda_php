<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(isset($_POST['enviar'])){ 
        foreach($_POST['unidades'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['carrito'][$key]); 
            }else{ 
                $_SESSION['carrito'][$key]['unidades']=$val; 
            } 
        }     
    } 
?> 
  
<h1>Carrito de Productos</h1> 
<form method="post" action="index.php?pagina=carrito"> 
      
    <table>
        <tr> 
            <th>Producto</th> 
            <th>Cantidad</th> 
            <th>Precio</th> 
            <th>Subtotal</th> 
        </tr> 
          
        <?php 
          require("includes/connection.php");
            $sql="SELECT * FROM articulo WHERE id IN (";           
                foreach($_SESSION['carrito'] as $id => $value) { 
                    $sql.=$id.","; 
                } 
                $sql=substr($sql, 0, -1).") ORDER BY nombre ASC"; 
                $query=mysqli_query($conexion, $sql); 
                $total=0; 
                while($fila=mysqli_fetch_array($query)){ 
                    $subtotal=$_SESSION['carrito'][$fila['id']]['unidades']*$fila['precio']; 
                    $total+=$subtotal; 
                ?> 
                    <tr> 
                        <td><?php echo $fila['nombre'] ?></td> 
                        <td><input type="text" class="numero" name="unidades[<?php echo $fila['id'] ?>]" size="8" value="<?php echo $_SESSION['carrito'][$fila['codigoComida']]['cantidad'] ?>" /></td> 
                        <td class="numero"><?php echo $fila['precio'] ?> €</td> 
                        <td class="numero"><?php echo number_format($_SESSION['carrito'][$fila['id']]
                        ['unidades']*$fila['precio'], 2, '.', '') ?> €</td> 
                    </tr> 
                <?php } ?> 
                <tr> 
                    <td colspan="4">Total: <?php echo number_format($total, 2, '.', '') ?> €</td> 
                </tr> 
    </table> 
    <br /> 
    <button type="submit" name="enviar">Actualizar carrito</button> 
</form> 
<br /> 
<p>Para quitar una comida, pon 0 en cantidad</p>
<a href="index.php?pagina=productos">Ir a los productos</a>