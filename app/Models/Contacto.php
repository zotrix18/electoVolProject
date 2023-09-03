<?php 
namespace App\Models;

use CodeIgniter\Model;

class Contacto extends Model{
    protected $table      = 'contactos';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'id_usuario',
        'nombre',
        'nick',
        'email',
        'asunto',
        'descripcion',
        'leido'
    ];
}