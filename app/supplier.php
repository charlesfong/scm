<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
	public $timestamps = false;
    protected $table = 'supplier';
    protected $primaryKey='id_supplier';
    protected $fillable=['nama','alamat','jenis','no_telp'];
}
