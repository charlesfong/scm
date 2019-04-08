<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermintaanBB extends Model
{
	public $timestamps = false;
    protected $table = 'permintaan_bahan_baku';
    protected $primaryKey='no_permintaan_bahan';
    protected $fillable=['no_permintaan_bahan','bahan_baku_id_bahan_baku','spk_id_spk','tanggal','no_revisi','jenis','jumlah','harga_satuan','total_harga','keterangan'];
}
