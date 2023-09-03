<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\Compra;
class Usuarios extends Controller{

    public function login(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('login.php', $datos);
    }

    public function sigin(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('sigin.php',$datos);
    }

    public function iniciar(){
        $usuario = new Usuario();
        $user = $this->request->getVar('user');
        $password = $_POST['pass'];
        $hashedPass = hash('sha256', $password);

        $nick=$usuario->where('usuario', $user)->first();
        
        

        if($nick==NULL){
            $session=session();
            $session->setFlashdata('mensaje','El usuario no existe');
            return redirect()->back()->withInput();
        }
        $id_user=$nick['perfil_id'];
        
        if($nick['baja'] == 'si'){
            $session=session();
            $session->setFlashdata('mensaje','Usuario supendido');
            return redirect()->back()->withInput();
        }
        
        if($hashedPass != $nick['pass']){
            $session=session();
            $session->setFlashdata('mensaje','Contraseña incorrecta');
            return redirect()->back()->withInput();
        }
        
        $session = session();
        $session->set('usuario', $nick);
        $session->set('cart_counter', 0);

        if(!($id_user==2)){
        return $this->response->redirect(site_url('/'));
        }else{
            return $this->response->redirect(base_url('inicio'));
        }
        
    }

    public function registrar(){
        $nombre = $this->request->getVar('nombre');
        $apellido = $this->request->getVar('apellido');
        $email = $this->request->getVar('email');
        $user = $this->request->getVar('user');
        $password = $_POST['pass'];

        $validacion= $this->validate([
            'nombre'=>'required|min_length[1]',
            'apellido'=>'required|min_length[1]',
            'email'=>'required|min_length[1]',
            'user'=>'required|min_length[1]' 
        ]);

        if ((strlen($password) < 5)) {
            // La contraseña no cumple con la longitud mínima requerida
            $session=session();
            $session->setFlashdata('mensaje','La contraseña debe tener almenos 5 caracteres');
            return redirect()->back()->withInput();
        } 

        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        //se instancia el acceso a la bd a travez del modelo
        $usuario = new Usuario();

        //verifica si el correo ya esta en la bd
        $correo=$usuario->where('email', $email)->first();
        if( !$correo == NULL){
            $session=session();
            $session->setFlashdata('mensaje','Correo ya registrado');
            return redirect()->back()->withInput();
        }
        
        //verifica que el user no estee siendo usado
        $nick=$usuario->where('usuario', $user)->first();
        if( !$nick ==NULL ){
            $session=session();
            $session->setFlashdata('mensaje','El usuario ya esta siendo usado');
            return redirect()->back()->withInput();
        }
        

        
        $hashedPass = hash('sha256', $password);

        $datos = [
            'nombre' => $nombre,
            'apellido'=> $apellido,
            'email'=> $email,
            'usuario'=> $user,
            'pass'=> $hashedPass,
            'perfil_id'=> 1,
            'baja'=>'no'
        ];
                
        $usuario->insert($datos);
        return $this->response->redirect(site_url('/login'));
    }

    public function logout(){
        session();
        session_destroy();
        return $this->response->redirect(site_url('/'));
    }

    public function listarUsuarios(){
        $usuario=new Usuario();
        $buscarNombre = $this->request->getVar('buscar_nombre'); //recepcion de nombre
        $buscarID = $this->request->getVar('buscar_id'); //recepcion de id

        if(!empty($buscarNombre)){
            $datos['usuarios'] = $usuario->like('usuario', $buscarNombre)->findAll();
        }elseif(!empty($buscarID)){
            $datos['usuarios'] = $usuario->where('id', $buscarID)->findAll();
        }else{
            $datos['usuarios']=$usuario->orderBy('id', 'ASC')->findAll(); 
        }
        
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/usuarios-admin', $datos);
    }

    public function baja($id=NULL){
        $usuario = new Usuario();
        $datosUsuario= $usuario->where('id', $id)->first();
        if($datosUsuario['baja']=='no'){
            $datosUsuario=[
                'baja'=>'si'
                
            ];
            $usuario->update($id, $datosUsuario);
        }else{
            $datosUsuario=[
                'baja'=>'no'
                ];
                $usuario->update($id, $datosUsuario);
        }
        return $this->response->redirect(site_url('usuariosAdmin'));
    }

    public function mis_compras(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        $compra = new Compra();
        $session = session();
        $logUser = $session->get('usuario');
        // var_dump($logUser['id']);
        $datos['facturas'] = $compra->where('id_usuario', $logUser['id'])->findAll(); 
        // var_dump($datos['facturas']);
        return view('usuario/Mis_facturas.php', $datos);
    }

    public function consulta(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('usuario/consulta.php', $datos);
    }

    public function cuenta(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('usuario/cuenta.php', $datos);
    }

    public function edicionCuenta(){
        $datos['cabecera']= view('template/header.php');
        $datos['pie']= view('template/footer.php');
        return view('usuario/cuentaEdicion.php', $datos);
    
    }

    public function actualizarCuenta(){
        $session=session();
        $id = $this->request->getVar('id');
        $nombre = $this->request->getVar('nombre');
        $apellido = $this->request->getVar('apellido');
        $email = $this->request->getVar('correo');
        $user = $this->request->getVar('usuario');
        $password = $this->request->getVar('contraseña');

        $validacion= $this->validate([
            'nombre'=>'required|min_length[1]',
            'apellido'=>'required|min_length[1]',
            'correo'=>'required|min_length[1]',
            'usuario'=>'required|min_length[1]' 
        ]);

        if ((strlen($password) < 5)) {
            // La contraseña no cumple con la longitud mínima requerida
            $session->setFlashdata('mensaje','La contraseña debe tener almenos 5 caracteres');
            return redirect()->back()->withInput();
        }
       
        if(!$validacion){
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        //se instancia el acceso a la bd a travez del modelo
        $usuario = new Usuario();
                        
        $hashedPass = hash('sha256', $password);

        $datos = [
            'nombre' => $nombre,
            'apellido'=> $apellido,
            'email'=> $email,
            'usuario'=> $user,
            'pass'=> $hashedPass
        ];

        $usuario->update($id, $datos);
        
        $nick = $usuario->where('id', $id)->first();

        $session->set('usuario', $nick);

        return $this->response->redirect(site_url('/micuenta'));
    }
}