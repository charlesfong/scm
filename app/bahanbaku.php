<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahanbaku extends Model
{
	public $timestamps = false;
    protected $table = 'bahan_baku';
    protected $primaryKey='id_bahan_baku';
    protected $fillable=['nama','stok','harga','satuan','supplier_id_supplier'];
}
