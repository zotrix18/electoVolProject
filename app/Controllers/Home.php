<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
     $data['cabecera']= view('template/header.php');
     $data['pie']= view('template/footer.php');
        return view('principal.php', $data);
    }

    public function nosotros(){
     $datos['cabecera']= view('template/header.php');
     $datos['pie']= view('template/footer.php');
        return view('nosotros.php', $datos);
    }

   public function construccion(){
     $datos['cabecera']= view('template/header.php');
     $datos['pie']= view('template/footer.php');
        return view('construccion.php', $datos);
   }

   public function comercializacion(){
     $datos['cabecera']= view('template/header.php');
     $datos['pie']= view('template/footer.php');
        return view('comercializacion.php', $datos);
   }

   public function terminos(){
     $datos['cabecera']= view('template/header.php');
     $datos['pie']= view('template/footer.php');
        return view('tyc.php', $datos);
   }

   public function contacto(){
     $datos['cabecera']= view('template/header.php');
     $datos['pie']= view('template/footer.php');
        return view('contacto.php', $datos);
   }
}
