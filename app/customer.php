<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	public $timestamps = false;
    protected $table = 'customer';
    protected $primaryKey='id_customer';
    protected $fillable=['nama','alamat','unit','no_telp','email'];
}
