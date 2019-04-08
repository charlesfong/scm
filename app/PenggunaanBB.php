<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenggunaanBB extends Model
{
	public $timestamps = false;
    protected $table = 'penggunaan_bahan_baku';
    protected $primaryKey='no_penggunaan_bahan';
    protected $fillable=['no_penggunaan_bahan','bahan_baku_id_bahan_baku','spk_id_spk','no_revisi','jenis','jumlah_masuk','jumlah_keluar','tgl_keluar','sisa_stok_sementara','stok_opname'];
}
