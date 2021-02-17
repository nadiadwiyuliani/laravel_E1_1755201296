<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table ='mahasiswas';
    protected $primaryKey = 'nim';

    protected $fillable =['nim','nama_lengkap','prodi','alamat'];

    protected $guarded =[];
    public function mprodi()
    {
    	return $this->hasOne('App\prodi','kode_prodi','prodi');
    }
}
