<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table            = 'obat';
    protected $primaryKey       = 'id_obat';
    protected $protectFields    = true;
    protected $useSoftDeletes = true;
    protected $allowedFields    = ['nama_obat', 'keterangan_obat', 'stok_obat', 'harga_obat', 'exp_obat', 'obat_image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getFullBarang($id_obat)
    {
    return $this->table('obat')
        ->select('obat.*, GROUP_CONCAT(kategori.nama_kategori SEPARATOR ", ") as kategori_name')
        ->join('obat_has_kategori', 'obat.id_obat = obat_has_kategori.obat_id_obat', 'left')
        ->join('kategori', 'obat_has_kategori.kategori_id_kategori = kategori.id_kategori', 'left')
        ->where('obat.id_obat', $id_obat)
        ->where('obat.deleted_at IS NULL', null, false) 
        ->groupBy('obat.id_obat')
        ->get()
        ->getRowArray();
}

}
