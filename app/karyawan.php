<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
	protected $guarded = ['id'];
	public $timestamps = false;
    protected $table = 'karyawan';
    protected $primaryKey='id_karyawan';
    protected $fillable=['nama','jabatan','alamat','telepon','active'];
}
