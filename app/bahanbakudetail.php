<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahanbakudetail extends Model
{
	public $timestamps = false;
    protected $table = 'bahan_baku_detail';
    protected $primaryKey='id';
    protected $fillable=['id_bahan_baku','nama','stok','satuan','harga','active','id_supplier','description'];
}
