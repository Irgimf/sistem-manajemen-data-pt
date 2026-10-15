<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;
use App\Models\CompanyModel;
use App\Models\SbuModel;

class Users extends BaseController
{
    protected $userModel;
    protected $companyModel;
    protected $sbuModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->companyModel = new CompanyModel();
        $this->sbuModel = new SbuModel();
    }

    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Kelola Pengguna',
            'users' => $this->userModel->where('role', 'user')->findAll()
        ];
        return view('users/index', $data);
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        // Hapus data dependen secara manual untuk amannya jika foreign key cascade SQLite tidak jalan
        $this->sbuModel->where('user_id', $id)->delete();
        $this->companyModel->where('user_id', $id)->delete();
        $this->userModel->delete($id);

        session()->setFlashdata('pesan', 'Akun pengguna dan seluruh datanya berhasil dihapus.');
        return redirect()->to('/users');
    }
}
