<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matakuliah';

    /**
     * many to many with Mahasiswa Models
     *
     * @return relationship
     */

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
        // return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'mahasiswa_id', null, 'id_mahasiswa');
    }

    /**
     * one to many with MataKuliah Models
     *
     * @return relationship
     */

    public function mataKuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}
