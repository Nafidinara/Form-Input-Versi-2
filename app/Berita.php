<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Berita
 * @package App
 * @mixin Eloquent
 */

class Berita extends Model
{
    protected $table = 'beritas';
    protected $primaryKey = 'berita_id';
    protected $fillable = [
        'judul','isi','foto'
    ];
}
