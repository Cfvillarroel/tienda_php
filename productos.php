<?php 
require("includes/connection.php");
if(isset($_GET['accion']) && $_GET['accion']=="anyadir"){ 
    $id=intval($_GET['id']); 
    if(isset($_SESSION['carrito'][$id])){ 
        $_SESSION['carrito'][$id]['cantidad']++; 
    }else{ 
        $sql_s="SELECT * FROM articulo WHERE id=$id"; 
        $query_s=mysqli_query($conexion, $sql_s); 
        if(mysqli_num_rows($query_s)!=0){ 
            $fila_s=mysqli_fetch_array($query_s); 

            $_SESSION['carrito'][$fila_s['id']]=array( 
                    "unidades" => 1, 
                    "precio" => $fila_s['precio']);
        }
    }
} 
?> 
<h1>Inventario de Artículos</h1>

<table> 
    <tr> 
        <th>Producto</th> 
        <th>Descripción</th>
        <th>Stock</th> 
        <th>Precio</th> 
        <th>Acción</th> 
    </tr> 

    <?php 
        $sql="SELECT * FROM articulo ORDER BY nombre ASC"; 
        $query=mysqli_query($conexion, $sql); 
        while ($fila=mysqli_fetch_array($query)) { 
    ?> 
        <tr> 
            <td><?php echo $fila['nombre'] ?></td> 
            <td><?php echo $fila['descripcion'] ?></td> 
            <td><?php echo $fila['unidades'] ?></td>
            <td class="numero"><?php echo $fila['precio'] ?> €</td> 
            <td><a href="index.php?pagina=productos&accion=anyadir&id=<?php echo $fila['id'] ?>">Añadir al carrito</a></td> 
        </tr> 
    <?php } ?> 
</table>
<br>
<a href="index.php?pagina=form_articulo">Añadir Artículo al Inventario</a>
<br>
<a href="index.php?pagina=carrito">Ir al carrito</a>
