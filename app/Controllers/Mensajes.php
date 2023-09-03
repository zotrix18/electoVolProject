<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mensaje;
class Mensajes extends Controller{

    public function listar(){
        $mensajes = new Mensaje();
        $datos['mensajes'] = $mensajes->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/mensajes-admin', $datos);
    }

    public function leido($id=NULL){
        $mensajes = new Mensaje();
        $mensajeleido= $mensajes->where('id', $id)->first();
        $mensajeleido=[
            'leido'=> '1'
        ];
        $mensajes->update($id, $mensajeleido);
        return $this->response->redirect(site_url('contactos'));
    }

    public function mensajeContacto(){
        
        $validacion= $this->validate([
            'nombre'=>'required|min_length[5]',
            'asunto'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]']);
    
        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        if($validacion){
            $mensaje= new Mensaje();
            $session=session();
            $session->setFlashdata('aviso','¡Pronto nos pondremos en contacto contigo!');
            $descripcion = $this->request->getVar('descripcion');
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'prefijo' => $this->request->getVar('prefijo'),
                'telefono' => $this->request->getVar('telefono'),
                'email' => $this->request->getVar('email'),
                'asunto' => $this->request->getVar('asunto'),
                'descripcion' => substr($descripcion, 0, 65535),
                'leido'=> '0'
            ];

            // var_dump($datos);
            $mensaje->insert($datos);
            return $this->response->redirect(site_url('contacto'));
        }
    }
}