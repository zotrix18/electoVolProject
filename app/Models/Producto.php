<?php 
namespace App\Models;

use CodeIgniter\Model;

class Producto extends Model{
    protected $table      = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'id_categoria',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'baja',
        'imagen'
    ];
   
}