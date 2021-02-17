<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    protected $table = 'prodies';
    protected $primaryKey = 'kode_prodi';

    public function mahasiswa()
    {
    	return $this->belongsTo('App\mahasiswa','prodi','kode_prodi');
    }
}
