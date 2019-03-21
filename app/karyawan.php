<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
	public $timestamps = false;
    protected $table = 'karyawan';
    protected $primaryKey='id_karyawan';
    protected $fillable=['nama','jabatan','alamat','telepon'];
}
