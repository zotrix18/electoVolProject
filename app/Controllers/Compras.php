<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Compra;
use App\Models\Producto;

class Compras extends Controller{

    public function agregarCarrito($id = NULL){        
        $productos = new Producto();
        $seleccionProd = $productos->where('id', $id)->first();
        $session = session();
        $counter = ($session->get('cart_counter')+1);
        $carrito2 =  $session->get('carro'); //traigo de nuevo la variable que en su momento fue carrito2 para darle formato de array

        if($carrito2!=NULL){    
            for($i=0 ; $i < count($carrito2) ; $i++){
                $item = $carrito2[$i];
                if($seleccionProd['id'] == $item['id_producto']){
                    //Se esta intentando agregar el mismo elemento
                    return $this->response->redirect(base_url('sumar/' . $i));
                    }
            }
        }
         
        $carrito2[] = [
            'id_producto' => $seleccionProd['id'],
            'nombre' => $seleccionProd['nombre'],
            'cantidad' => 1,
            'importe_unitario' => $seleccionProd['precio'],
            'importe' =>$seleccionProd['precio'],
            'fecha' => date('d-m-y')
        ];
        $carrito2 = array_values($carrito2);
        $session->set ('carro', $carrito2);
        $session->set('cart_counter', $counter);
        return $this->response->redirect(base_url('catalogo'));
    }

    public function carrito(){
        $session = session();
        $counter = $session->get('cart_counter');
        for ($i = 1; $i < $counter; $i++) {
            $cartKey = 'cart' . $i;
            $cartItem = $session->get($cartKey);
            $datos[$cartKey]=$cartItem;
        }
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('carrito.php', $datos);
    }

    public function quitarItemCarrito($idCart = NULL){
        $session = session();
      
        $carrito2 =  $session->get('carro'); //traigo de nuevo la variable que en su momento fue carrito2 para darle formato de array
        if (isset($carrito2[$idCart])) {
            unset($carrito2[$idCart]);
        }
        $carrito2 = array_values($carrito2);
        $session->set('carro', $carrito2);
        $counter= $session->get('cart_counter');
        $session->set('cart_counter', ($counter - 1));
        return $this->response->redirect(base_url('carrito'));
    }
    
    public function sumar($idCart = NULL){
        $session = session();
        $productos=new Producto();
        $carrito2 =  $session->get('carro'); //traigo de nuevo la variable que en su momento fue carrito2 para darle formato de array
        $item = $carrito2[$idCart];

        $seleccionProd = $productos->where('id', $item['id_producto'])->first();
        $cant = ($item['cantidad'] +1 );


        if($seleccionProd ['stock']< $cant){
            $validacion = true;
        }else{
            $validacion = false;
        }

        if($validacion){
            $session=session();
            $session->setFlashdata('stock','No hay stock suficiente');
            return $this->response->redirect(base_url('carrito'));
        }

              
        $compraMOD = [
            'id_producto' => $seleccionProd['id'],
            'nombre' => $seleccionProd['nombre'],
            'cantidad'=> $cant,
            'importe_unitario' => $seleccionProd['precio'],
            'importe'=> ($cant * $seleccionProd['precio']),
            'fecha' => date('d-m-y')
        ];
        $carrito2[$idCart] = $compraMOD;
        $session->set('carro', $carrito2);
        return $this->response->redirect(base_url('carrito'));
    }
    
    public function restar($idCart = NULL){
        $session = session();
        $productos=new Producto();
        $carrito2 =  $session->get('carro'); //traigo de nuevo la variable que en su momento fue carrito2 para darle formato de array
        $item = $carrito2[$idCart];

        $seleccionProd = $productos->where('id', $item['id_producto'])->first();
        $cant = ($item['cantidad'] -1 );
       
        if($cant == 0){
            return $this->response->redirect(base_url('quitar/'. $idCart));
        }    

        $compraMOD = [
            'id_producto' => $seleccionProd['id'],
            'nombre' => $seleccionProd['nombre'],
            'cantidad'=> $cant,
            'importe_unitario' => $seleccionProd['precio'],
            'importe'=> $cant * $seleccionProd['precio'],
            'fecha' => date('d-m-y')
        ];
        $carrito2[$idCart] = $compraMOD;
        $session->set('carro', $carrito2);
        return $this->response->redirect(base_url('carrito'));
    }

    public function limpiar(){
        $session = session();
        $carrito2 = [];
        $session -> set ('carro', NULL);
        $session -> set ('cart_counter', 0);
        return $this->response->redirect(base_url('catalogo'));
    }

    public function pago(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('pago.php', $datos);
    }
}