<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';

    protected $fillable =['kode_mk','nama_mk','sks','semester'];

    public function dosen()
    {
    	return $this->belongsTo('App\dosen','mata_kuliah','kode_mk');
    }
}
