<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DetCom;
use App\Models\Compra;
use App\Models\Producto;
class ComprasConfirmadas extends Controller{

    public function confirmarPago(){
        // echo 'funciona';
        $session = session();
        $total = $session -> get('total');
        $userInfo = $session->get('usuario');
        
        //ver si es en pago efectivo/cheque, si el contenido recepcionado es nulo
        if($this->request->getVar('tarjeta') != null){
           
           //es credito
            
                // var_dump($this->request->getVar('tarjeta'));
                if ($this->request->getVar('cuota')==3) {
                            $total = ($total*1.21);
                        }elseif ($this->request->getVar('cuota')==6){
                            $total = ($total*1.5);
                        }elseif ($this->request->getVar('cuota')==12){
                            $total = ($total*2.1);
                        }   

                // var_dump($total);
                if($this->request->getVar('medio') == 'opcion11'){
                            $medio = 'oca';
                        }elseif ($this->request->getVar('medio') == 'opcion12'){
                            $medio = 'andreani';
                        }elseif ($this->request->getVar('medio') == 'opcion13'){
                            $medio = 'presencial';
                        }


                if($this->request->getVar('direccion')!=NULL){
                    $direccion = $this->request->getVar('direccion');
                        }elseif($this->request->getVar('direccion2')!=NULL){
                            $direccion=  $this->request->getVar('direccion2');
                        }else{
                            $direccion = 'presencial';
                        }

                $metodo_pago = 2;
                $tarjeta = $this->request->getVar('tarjeta');
                $cuotas = $this->request->getVar('cuota');
                $envio = $medio;
                $direccion = $direccion;
                $fecha = date('y-m-d');

                }else{//es efectivo
                    $metodo_pago = 1;
                    $tarjeta = 'Cheque/Efectivo';
                    $cuotas = 1;
                    $envio = 'Presencial';
                    $direccion = 'No aplica';
                    $fecha = date('y-m-d');
                   
                }

                $compra = new Compra();
                    $datos = [
                        'total' => $total,
                        'id_usuario' => $userInfo['id'],
                        'metodo_pago' => $metodo_pago,
                        'numero_tarjeta' =>$tarjeta,
                        'cuotas' => $cuotas,
                        'envio'=> $envio,
                        'direccion' => $direccion,
                        'fecha_alta' => $fecha
                    ];
                    $compra->insert($datos);
                    $idCompra = $compra->getInsertID();
                    $session ->set ('idComprobante', $idCompra);
                    $datos = [];//limpieza del array datos
                    $productos = new Producto();
                    $detComs = new DetCom();
                    
                    // var_dump($compras['id']);//id unico por compra
                    $carrito2 = $session->get('carro');
                    for ($i = 0; $i < count($carrito2); $i++) {
                        if(isset($carrito2[$i])){
                        $datoCarro = $carrito2[$i];
                        $datos = [
                            'id_compra' => $idCompra,
                            'id_producto' => $datoCarro['id_producto'],
                            'nombre' => $datoCarro['nombre'],
                            'cantidad' => $datoCarro['cantidad'],
                            'importe_unitario' => $datoCarro['importe_unitario'],
                            'importe' => $datoCarro['importe'],
                            'fecha' => $datoCarro['fecha']
                        ];
                            }
                            $detComs->insert($datos);   

                        }
        
        $session -> set('cart_counter', 0);
        $session -> set('carro',[]);
        
        return $this->response->redirect(base_url('procesando'));
    }

    public function animacion(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('animacion.php', $datos);
    }
        
    public function comprobante($idCompra = NULL){
        $session = session();
        $tipoUser = $session -> get('usuario');
        

        if($tipoUser['perfil_id'] == 2){
            $datos['cabecera']= view('template/header-admin.php');
        }else{
            $datos['cabecera']= view('template/header.php');
        }
        
        $datos['pie']= view('template/footer.php');
        
        $compras = new Compra();
        $detComs = new DetCom();
        
        $datos['id_compra'] = $idCompra;
        $datos['datos_compra'] = $compras->where('id', $idCompra)->first();
        $datos['detalle_compra'] = $detComs->where('id_compra', $idCompra)->findAll();
        // var_dump($datos['detalle_compra']);
        return view('comprobante.php', $datos);
    }    



}