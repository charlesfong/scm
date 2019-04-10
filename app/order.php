<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
	public $timestamps = false;
    protected $table = 'order';
    protected $primaryKey='id_order';
    protected $fillable=['customer_id_customer','karyawan_id_karyawan','grand_total','keterangan','status'];
}
