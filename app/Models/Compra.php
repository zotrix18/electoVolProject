<?php 
namespace App\Models;

use CodeIgniter\Model;

class Compra extends Model{
    protected $table      = 'compras';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'total',
        'id_usuario',
        'metodo_pago',
        'numero_tarjeta',
        'cuotas',
        'envio',
        'direccion',
        'fecha_alta'
    ];
}