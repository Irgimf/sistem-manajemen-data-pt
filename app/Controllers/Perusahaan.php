<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\CompanyModel;

class Perusahaan extends BaseController
{
    protected $companyModel;

    public function __construct()
    {
        $this->companyModel = new CompanyModel();
    }

    public function index()
    {
        $role = session()->get('role');
        $userId = session()->get('id');
        
        if ($role === 'admin') {
            $companies = $this->companyModel->findAll();
        } else {
            $companies = $this->companyModel->where('user_id', $userId)->findAll();
        }

        $data = [
            'title' => 'Data Perusahaan',
            'companies' => $companies
        ];
        return view('perusahaan/index', $data);
    }

    public function create()
    {
        $role = session()->get('role');
        $userId = session()->get('id');
        
        if ($role === 'user') {
            $existing = $this->companyModel->where('user_id', $userId)->first();
            if ($existing) {
                session()->setFlashdata('pesan', 'Anda sudah memiliki data perusahaan. Satu akun hanya untuk satu perusahaan.');
                return redirect()->to('/perusahaan');
            }
        }

        $data = [
            'title' => 'Tambah Data Perusahaan'
        ];
        return view('perusahaan/create', $data);
    }

    public function store()
    {
        $userId = session()->get('id');
        
        // Admin bisa jadi menginput untuk user lain? Untuk simplenya admin juga akan tertaut user_id admin,
        // namun untuk kebutuhan nyata mungkin ada dropdown. Kita buat default user_id pembuat.
        $this->companyModel->save([
            'user_id'   => $userId,
            'nama_pt'   => $this->request->getVar('nama_pt'),
            'nama_pjbu' => $this->request->getVar('nama_pjbu'),
            'no_kta'    => $this->request->getVar('no_kta'),
            'alamat_pt' => $this->request->getVar('alamat_pt'),
            'kualifikasi' => $this->request->getVar('kualifikasi'),
            'kategori_sbu' => $this->request->getVar('kategori_sbu')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/perusahaan');
    }

    public function edit($id)
    {
        $company = $this->companyModel->find($id);
        
        if (session()->get('role') === 'user' && $company['user_id'] != session()->get('id')) {
            return redirect()->to('/perusahaan');
        }

        $data = [
            'title' => 'Edit Data Perusahaan',
            'company' => $company
        ];
        return view('perusahaan/edit', $data);
    }

    public function update($id)
    {
        $company = $this->companyModel->find($id);
        if (session()->get('role') === 'user' && $company['user_id'] != session()->get('id')) {
            return redirect()->to('/perusahaan');
        }

        $this->companyModel->update($id, [
            'nama_pt' => $this->request->getVar('nama_pt'),
            'nama_pjbu' => $this->request->getVar('nama_pjbu'),
            'no_kta' => $this->request->getVar('no_kta'),
            'alamat_pt' => $this->request->getVar('alamat_pt'),
            'kualifikasi' => $this->request->getVar('kualifikasi'),
            'kategori_sbu' => $this->request->getVar('kategori_sbu')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/perusahaan');
    }

    public function delete($id)
    {
        $company = $this->companyModel->find($id);
        if (session()->get('role') === 'user' && $company['user_id'] != session()->get('id')) {
            return redirect()->to('/perusahaan');
        }

        $this->companyModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/perusahaan');
    }
}
