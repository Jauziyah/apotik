<?php

namespace App\Models;

use CodeIgniter\Model;

class ObathasKategori extends Model
{
    protected $table            = 'obat_has_kategori';
    protected $primaryKey       = 'id_obat_has_kategori';
    protected $protectFields    = true;
    protected $allowedFields    = ['obat_id_obat', 'kategori_id_kategori'];

}
