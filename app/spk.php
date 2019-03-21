<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spk extends Model
{
	public $timestamps = false;
    protected $table = 'spk';
    protected $primaryKey='id_spk';
    protected $fillable=['order_id_order','lama_kerja','biaya','lokasi_tempat_customer','deskripsi'];
}
