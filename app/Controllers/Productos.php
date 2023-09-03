<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;
use App\Models\Categoria;

class Productos extends Controller{

    public function guardar(){
        $session=session();
        $categoria = $this->request->getVar('categoria');
        $nombre = $this->request->getVar('nombre');
        $descripcion = $this->request->getVar('descripcion');
        $stock = $this->request->getVar('stock');
        $precio = $this->request->getVar('precio');
        
        $validacion= $this->validate([
            'nombre'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]',
            'stock' => 'required|greater_than[0]',
            'precio'=>'required|greater_than[99]',
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,3000]', //esta en kb
            ]
        ]);

    
        if(!$validacion){
            
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }
        
        $producto = new Producto();

        if ($imagen = $this->request->getFile('imagen')) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('uploads/',$nuevoNombre);

            $datos = [
                'id_categoria' => $categoria,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'stock' => $stock,
                'precio' => $precio,
                'baja' => 0,
                'imagen' => $nuevoNombre];
            $producto->insert($datos);
            $session->setFlashdata('aviso','Añadido Correctamente');
        } 

    return $this->response->redirect(site_url('productosAdmin'));        
    }
    
    public function editar($id=NULL){
        $producto= new Producto();
        $categoria = new Categoria();
        $datos['producto']=$producto->where('id', $id)->first();
        $datos['categorias']=$categoria->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/editar-admin.php', $datos);
    }

    public function actualizar(){
        $session=session();  
        $validacion= $this->validate([
            'nombre'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]',
            'precio'=>'required|greater_than[99]',
            'stock' => 'required|greater_than[0]'
        ]);


        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        $datos = [
            'id_categoria' => $this->request->getVar('categoria'),
            'nombre' => $this->request->getVar('nombre'),
            'descripcion'=> $this->request->getVar('descripcion'),
            'precio'=> $this->request->getVar('precio'),
            'stock' => $this->request->getVar('stock')
         ];

        $validacion= $this->validate([
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,36000]', //esta en kb
            ]
        ]);

        // var_dump($validacion);
        $productos= new Producto();
        $id=$this->request->getVar('id');
        
        if($validacion){
            //Si se cambia la imagen
            if ($imagen = $this->request->getFile('imagen')) {
                echo 'hay img';

                // desvinculacion de foto anterior
                $datosProducto=$productos->where('id',$id)->first();              
                $ruta=('uploads/'.$datosProducto['imagen']);
                unlink($ruta);

                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('uploads/', $nuevoNombre);
    
                $datos = [
                    'imagen' => $nuevoNombre
                ];
                
                $productos->update($id, $datos);

            }else{
                
                $session->setFlashdata('mensaje','Tamaño excedido');
                return redirect()->back()->withInput();
                }
            }else{
            //Si no se cambia la imagen
                $productos->update($id, $datos);
                
            }
            $session->setFlashdata('aviso','Producto modificado correctamente');
        return $this->response->redirect(site_url('productosAdmin'));
    }

    public function listar(){
        $productos = new Producto();
        $categoria = new Categoria();
        $categoriaSelec = $this->request->getVar('categoria'); //recepcion de categoria
        $orden = $this->request->getVar('orden'); //recepcion de orden
        if($categoriaSelec != NULL){
            $datos['productos']= $productos->where('id_categoria', $categoriaSelec)->findAll();
        }elseif($orden == 1){
            $datos['productos']= $productos->orderBy('precio', 'ASC')->findAll();
        }elseif($orden == 2){
            $datos['productos']= $productos->orderBy('precio', 'DESC')->findAll();
        }else{
            $datos['productos']= $productos->orderBy('id', 'ASC')->findAll();
        }
        
        $datos['categorias']= $categoria->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('catalogo.php', $datos);
    }
}

