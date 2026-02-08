<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriModel;
use App\Models\ObatModel;
use App\Models\ObathasKategori;

class AdminObat_crudv extends BaseController
{
    protected $kategori_model;
    protected $obat_model;
    protected $pivot_kategori;
    protected $db;
    protected $validation;
    public function __construct()
    {
        $this->kategori_model = new KategoriModel();
        $this->obat_model = new ObatModel();
        $this->pivot_kategori = new ObathasKategori();
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $obat_list = $this->obat_model->findAll();

        $data = [
            'obat_list' => $obat_list
        ];
        return view('admin/main', $data);
    }

    public function createView()
    {
        $kategori_list = $this->kategori_model->findAll();

        $data = [
            'kategori_list' => $kategori_list
        ];
        return view('admin/obat_create', $data);
    }

    public function createObat()
    {
        $obat_image = $this->request->getFile('obat_image');
        $obat_image_name = $obat_image->getRandomName();

        $obat_image->move(base_url('uploads/'), $obat_image_name);


        $this->obat_model->save([
            'nama_obat' => $this->request->getVar('nama_obat'),
            'harga_obat' => $this->request->getVar('harga_obat'),
            'exp_obat' => $this->request->getVar('exp_obat'),
            'keterangan_obat' => $this->request->getVar('keterangan_obat'),
            'stok_obat' => $this->request->getVar('stok_obat'),
            'obat_image' => $obat_image_name,
        ]);

        $kategori_inputs = $this->request->getVar('kategori_obat');

        foreach ($kategori_inputs as $input) {
            $this->pivot_kategori->save([
                'obat_id_obat' => $this->obat_model->getInsertID(),
                'kategori_id_kategori' => $input
            ]);
        }

        redirect()->route('admin.main_view')->with('pesan', 'obat ditambah');
    }

    public function updateView($id_obat)
    {
        $kategori_list = $this->kategori_model->findAll();
        $obat_data = $this->obat_model->find($id_obat);
        $data = [
            'obat_data' => $obat_data,
            'kategori_list' => $kategori_list
        ];

        return view('admin/obat_update', $data);
    }

    public function updateObat($id_obat)
    {  
        if(!$this->validate([
            'kategori_obat' => 'required'
        ])){
            return redirect()->back()->withInput();
        }

        $obat_image = $this->request->getFile('obat_image');


        $old_obat = $this->obat_model->find($id_obat);

        if($obat_image->getError()==4)
        {
            $obat_image_name = $old_obat['obat_image'];
        } else{
            $obat_image_name = $obat_image->getRandomName();
            $obat_image->move(base_url('uploads/'), $obat_image_name);
            unlink('uploads/' . $old_obat['obat_image']);
        }

        $this->obat_model->save([
            'id_obat' => $id_obat,
            'nama_obat' => $this->request->getVar('nama_obat'),
            'harga_obat' => $this->request->getVar('harga_obat'),
            'exp_obat' => $this->request->getVar('exp_obat'),
            'keterangan_obat' => $this->request->getVar('keterangan_obat'),
            'stok_obat' => $this->request->getVar('stok_obat'),
            'obat_image' => $obat_image_name,
        ]);

        $this->pivot_kategori->where('obat_id_obat', $id_obat)->delete();

        $kategori_inputs = $this->request->getVar('kategori_obat');

        foreach ($kategori_inputs as $input) {
            $this->pivot_kategori->save([
                'obat_id_obat' => $id_obat,
                'kategori_id_kategori' => $input
            ]);
        }

       return redirect()->route('admin.main_view')->with('pesan', 'obat diupdate');
    }

    public function detailObat($obat_id)
    {
        $data_obat = $this->obat_model->getFullBarang($obat_id);

        $data = [
            'data_obat' => $data_obat
        ];
        return view('admin/detail_obat', $data);
    }
    
}
