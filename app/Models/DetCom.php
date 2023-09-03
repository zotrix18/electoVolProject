<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetCom extends Model{
    protected $table      = 'detalle_compra';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $allowedFields= [
        'id_compra',
        'id_producto',
        'nombre',
        'cantidad',
        'importe_unitario',
        'importe',
        'fecha'
    ];
}