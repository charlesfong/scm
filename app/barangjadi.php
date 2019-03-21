<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangjadi extends Model
{
	public $timestamps = false;
    protected $table = 'barang_jadi';
    protected $primaryKey='id_barang_jadi';
    protected $fillable=['spk_id_spk','nama'];
}
