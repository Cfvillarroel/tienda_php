<?php
    include_once('includes/connection.php');
    class Product extends Model{
        public $codigo;
        public $producto;
        public $descripcion;
        public $precio;
        public $unidades;

        public function __construct(){
            parent::__construct();
        }

        public function get_products(){
            $sql = $this->db->query("SELECT * FROM articulos");
            $html ='';
            foreach($sql->fetch_all(MYSQLI_ASSOC) as $key){
                $code = "'" $key['producto_id'] "'";
                $html .= '<tr>
                    <td>' $key['producto_id'] '</td>
                    <td>' $key['producto_nombre'] '</td>
                    <td>' $key['producto_descripcion'] '</td>
                    <td align = "right">'$key['producto_precio']'</td>
                    <td align = "right">
                        <input type="number" id="'$key['producto_codigo']'" value="1" min="1"> 
                    </td>
                    <td>
                        <button onClick="addProduct('.$code.');">
                            Agregar
                        </button>
                    </td>
                </tr>';    
            }
        return $html;
        }
    }
?>