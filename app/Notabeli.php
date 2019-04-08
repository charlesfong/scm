<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notabeli extends Model
{
	public $timestamps = false;
    protected $table = 'nota_beli';
    protected $primaryKey='no_nota';
    protected $fillable=['no_nota','tanggal','harga_total','permintaan_bahan_baku_no_permintaan_bahan','supplier_id_supplier'];
}
