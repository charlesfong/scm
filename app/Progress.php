<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class progress extends Model
{
	public $timestamps = false;
    protected $table = 'progress_produksi';
    protected $primaryKey='no_dokumen';
    protected $fillable=['no_dokumen','tgl_buat','no_revisi','id_spk'];
}
