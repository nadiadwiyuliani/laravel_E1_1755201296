<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table ='dosen';
    protected $primaryKey = 'nid';

    protected $fillable =['nid','nama_lengkap','mata_kuliah','alamat'];

    protected $guarded =[];
    public function mmatak()
    {
    	return $this->hasOne('App\matakuliah','kode_mk','mata_kuliah');
    }
}
