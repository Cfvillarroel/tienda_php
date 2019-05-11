<?php
    include_once('productos.php');
    include_once('carrito.php');
    $product = new Product();
    $cart = new Cart();
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'add':
                $cart->add_item($_GET['code'], $_GET['amount']);
            break;
            case 'remove':
                $cart->remove_item($_GET['code']);
            break;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carro de compras</title>
    <script type="text/javascript" src="js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="content">
        <table border="1px" cellpadding="5px" width="100%">
            <thead>
                <tr>
                    <th colspan="6">Carrito de Compras</th>
                </tr>
                <tr>
                    <th colspan="3">Total a pagar: <?=$cart->get_total_payment();?></th>
                    <th colspan="3">Cantidad de items: <?=$cart->get_total_items();?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Opcion</th>
                </tr>
                <?=$cart->get_items();?>
            </tbody>
        </table>
        <br><br>
        <table border="1px" cellpadding="5px" width="100%">
            <thead>
                <tr>
                    <th colspan="6">Lista de Productos</th>
                </tr>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Opcion</th>
                </tr>
                <?=$product->get_products();?>
            </tbody>
        </table>
        </div>
</body>
</html>