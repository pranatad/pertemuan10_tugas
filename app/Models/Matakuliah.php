<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    /**
     * One to many with Mahasiswa Models
     *
     * @return relationship
     */

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
