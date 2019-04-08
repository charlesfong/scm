<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class progressdetail extends Model
{
	public $timestamps = false;
    protected $table = 'detail_progress';
    protected $primaryKey='id';
    protected $fillable=['tanggal_rencana','tanggal_progress','hasil','keterangan','id_karyawan','id_mesin','no_dokumen'];
}
