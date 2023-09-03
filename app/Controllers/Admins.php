<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Usuario;
use App\Models\Categoria;

class Admins extends Controller{

    public function inicio(){
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/inicio-admin.php', $datos);
    }

    public function productosAdmin(){
        $productos=new Producto();
        $categoria = new Categoria();
        $categoriaSelec = $this->request->getVar('categoria'); //recepcion de categoria
        $buscarNombre = $this->request->getVar('buscar_nombre');
        $buscarID = $this->request->getVar('buscar_id');
        

        if(!empty($categoriaSelec)){
            $datos['productos'] = $productos->where('id_categoria', $categoriaSelec)->findAll();
        } elseif(!empty($buscarNombre)){
            $datos['productos'] = $productos->like('nombre', $buscarNombre)->findAll();
        }elseif(!empty($buscarID) ){
            $datos['productos'] = $productos->where('id', $buscarID)->findAll();
        }else{
            $datos['productos'] = $productos->orderBy('id')->findAll();
        }
        $datos['categorias']=$categoria->orderBy('id')->findAll();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/productos-admin.php', $datos);
    }

    public function añadir(){
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/añadir-admin.php', $datos);
    }

    public function facturas(){
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        
        $fecha = $this->request->getVar('fecha'); //recepcion de fecha
        $fecha2 = $this->request->getVar('fecha2'); //recepcion de fecha
        $compra = new Compra();
        $datos['prueba']=$fecha;
        
        $usuarios = new Usuario();
        $users = $usuarios->orderBy('id', 'ASC')->findAll();
        $datos['usuarios'] = $users;

        if ($fecha !=NULL) { //filtra si recibe una fecha
            $datos['datos_compras'] = $compra->where('fecha_alta >=', $fecha)
                                             ->where('fecha_alta <=', $fecha2)
                                             ->findAll();
        }else{
            $datos['datos_compras'] = $compra->orderBy('id', 'ASC')->findAll(); 
        }
        
        
        return view('admin/compras-admin.php', $datos);
    }
   
    public function bajaProducto($id=NULL){
        $producto = new Producto();
        $datosProducto = $producto->where('id', $id)->first();
        if($datosProducto ['baja'] == 0){
            $datosProducto=[
                'baja'=> 1
            ];
            $producto->update($id, $datosProducto);
        }else{
            $datosProducto=[
                'baja'=> 0
                ];
            $producto->update($id, $datosProducto);
        }
        return $this->response->redirect(site_url('productosAdmin'));
    }

    public function categoriasAdmin(){
        $categoria = new Categoria();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        $datos['categorias']=$categoria->orderBy('id')->findAll();
        return view('admin/categorias-admin.php', $datos);
    
    }
    
    public function bajaCategoria($id=NULL){
        $categoria = new Categoria();
        $datoscategoria = $categoria->where('id', $id)->first();
        if($datoscategoria ['baja'] == 0){
            $datoscategoria=[
                'baja'=> 1
            ];
            $categoria->update($id, $datoscategoria);
        }else{
            $datoscategoria=[
                'baja'=> 0
                ];
            $categoria->update($id, $datoscategoria);
        }
        return $this->response->redirect(site_url('categoriasAdmin'));
    }

    public function editarCategoria($id=NULL){
        $categoria = new Categoria();
        $datos['categoria']=$categoria->where('id', $id)->first();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/editarCategoria-admin.php', $datos);
    }

    public function actualizarCategoria(){
        $validacion= $this->validate([
            'nombre'=>'required|min_length[3]',
        ]);


        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }else{
            $datos = [
                'nombre' => $this->request->getVar('nombre')
             ];
    
            $categoria= new Categoria();
            $id=$this->request->getVar('id');
            
            $categoria->update($id, $datos);
        }

        
        return $this->response->redirect(site_url('categoriasAdmin'));
    }

    public function añadirCategoria(){
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/añadirCat-admin.php', $datos);
    }

    public function guardarCategoria(){
 
        $validacion= $this->validate([
            'nombre'=>'required|min_length[3]',
        ]);

        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }else{
            if($this->request->getVar('alta') == NULL){
                $baja = 1;
            }else{
                $baja = 0;
            }
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'baja' => $baja
             ];
    
            $categoria= new Categoria();
            $categoria->insert($datos);
            
        }

        return $this->response->redirect(site_url('categoriasAdmin'));
    }
}