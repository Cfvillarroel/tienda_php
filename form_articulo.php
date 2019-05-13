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
<h1>Añadir Artículo a Inventario</h1> 
<body>
     <?php
    /*if(isset($_POST['save'])){
        $sql = "INSERT INTO articulo (nombre, unidades, precio, costo, descripcion)
        VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($sql);
        $stmt-> bind_param("sss",$_POST["producto"],$_POST["cantidad"],$_POST["precio"],$_POST["costo"],$_POST["descripcion"])
        $stmt-> execute();
    }*/
    ?>
    </form>
    <table>
        <tr>
            <td>Producto</td>
            <td><label id="producto"></label>
                <input type="text" name="producto"></td>
        </tr>
        <tr>
            <td>Cantidad</td>
            <td><label id="producto"></label>
                <input type="text" class="numero" name="cantidad"></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><label id="producto"></label>
                <input type="text" class="numero" name="precio"></td>
        </tr>
        <tr>
            <td>Costo</td>
            <td><label id="producto"></label>
                <input type="text" class="numero" name="costo"></td>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td><label id="producto"></label>
                <input type="text" name="decripcion"></td>
        </tr>
        </table>
    <button type="submit" name="save">Agregar Artículo</button>
    <button type="submit" name="get">get</button>

</body>
</html>
<br /> 
<a href="index.php?pagina=productos">Ir a los productos</a>