<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminKategori_crudv extends BaseController
{
    protected $kategori_model;
    public function __construct()
    {
        $this->kategori_model = new KategoriModel();
    }
    public function index()
    {
        $kategori_list = $this->kategori_model->findAll();
        $data = [
            'kategori_list' => $kategori_list
        ];
        return view('admin/kategori', $data);
    }

    public function createView()
    {

        $data = [
            'validation' => \Config\Services::validation(),

        ];
        return view('admin/kategori_create', $data);
    }

    public function createKategori()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required|max_length[45]',
                'errors' => [
                    'required' => 'Jangan Biarkan Kosong',
                    'max_length' => 'Nama terlalu panjang, maksimal 45 huruf',
                ]
            ]
        ])) {
            $data = [
                'validation' => $this->validator
            ];
            return view('admin/kategori_create', $data);
        }

        $this->kategori_model->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
                return redirect()->route('admin.kategori_view')->with('pesan', 'Kategori ditambahkan');
    }

    public function deleteKategori($id)
    {

        $this->kategori_model->delete($id);
        return redirect()->route('admin.kategori_view')->with('pesan', 'Kategori dihapus');
    }
}
