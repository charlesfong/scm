<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bom extends Model
{
	public $timestamps = false;
    protected $table = 'b_o_m';
    protected $fillable=['barang_jadi_id_barang_jadi','bahan_baku_id_bahan_baku','bagian','ukuran_mentah','ukuran_jadi','ukuran_luasan','jumlah_bagian','jumlah_satuan_bahan','harga_satuan'];
}
