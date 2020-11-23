<?php namespace App\Models;

use CodeIgniter\Model;

class ModeloAnimales extends Model{

    protected $table='animales';
    protected $primaryKey='id';

    protected $allowedFields = array('nombre','edad','tipo','descripcion','comida','foto');

}