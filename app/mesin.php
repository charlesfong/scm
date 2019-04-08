<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesin extends Model
{
    // use SoftDeletes;
    protected $table = 'mesin';
    protected $primaryKey='id_mesin';
    public $timestamps = false; //artinya ndak da created_at sm updated_at
    protected $fillable = ['nama','image','tanggal_beli'];

}
