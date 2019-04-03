<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mesin extends Model
{
	public $timestamps = false;
    protected $table = 'mesin';
    protected $primaryKey='id_mesin';
    protected $fillable=['nama','active'];
}
