<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
	public $timestamps = false;
    protected $table = 'order_detail';
    protected $primaryKey='id';
    protected $fillable=['order_detail_id','kode_barang','nama_barang','jumlah','satuan','harga_satuan','alamat_pengiriman','biaya_transport','subtotal','keterangan','tanggal'];
}
