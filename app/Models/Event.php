<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

protected $fillable = [
    'judul',
    'sub_judul',
    'deskripsi',
    'deskripsi_singkat',
    'tanggal',
    'tanggal_berakhir',
    'lokasi',
    'gambar',
];


}
