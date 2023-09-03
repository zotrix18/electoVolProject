<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mensaje extends Model{
    protected $table      = 'mensajes';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'nombre',
        'prefijo',
        'telefono',
        'email',
        'asunto',
        'descripcion',
        'leido'
    ];

}