<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Contacto;
class Contactos extends Controller{

    public function listar(){
        $contactos = new Contacto();
        $datos['contactos'] = $contactos->orderBy('id', 'ASC')->findAll();
        $datos['cabecera']= view('template/header-admin.php');
        $datos['pie']= view('template/footer.php');
        return view('admin/contactos-admin', $datos);
    }

    public function contactoLeido($id=NULL){
        $contactos = new Contacto();
        $mensajeleido= $contactos->where('id', $id)->first();
        $mensajeleido=[
            'leido'=> '1'
        ];
        $contactos->update($id, $mensajeleido);
        return $this->response->redirect(site_url('consultas'));
    }

    public function mensajeConsulta(){
        
        $validacion= $this->validate([
            'asunto'=>'required|min_length[3]',
            'descripcion'=>'required|min_length[3]']);
    
        if(!$validacion){
            $session=session();
            $session->setFlashdata('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        if($validacion){
            $contactos = new Contacto();
            $session=session();
            $datoUser = $session -> get('usuario');
            $session->setFlashdata('aviso','¡Pronto nos pondremos en contacto contigo!');
            $descripcion = $this->request->getVar('descripcion');
            $datos = []; //limpieza del array
            $datos = [
                'id_usuario' => $datoUser['id'],
                'nombre' => $datoUser['nombre'],
                'nick' => $datoUser ['usuario'],
                'email' => $datoUser ['email'],
                'asunto' => $this->request->getVar('asunto'),
                'descripcion' => substr($descripcion, 0, 65535),
                'leido'=> '0'
            ];

            // var_dump($datos);
            $contactos->insert($datos);
            return $this->response->redirect(site_url('consulta'));
        }
    }

}