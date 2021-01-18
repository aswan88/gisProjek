<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\InfoDesaModel;
use App\Models\AdminModel;
use Error;

class Admin extends BaseController
{
    protected $DesaModel;
    protected $InfoDesaModel;
    protected $AdminModel;

    public function __construct()
    {
        $this->DesaModel = new DesaModel();
        $this->InfoDesaModel = new InfoDesaModel();
        $this->AdminModel = new AdminModel();
        // $this->file = new upload();
    }
    public function index()
    {
        if (@$_SESSION['username'] == null) {
            session()->setFlashdata('pesanError', 'Anda tidak di ijinkan');
            return redirect()->to('/admin/login');
        } else {
            $data = [
                'username' => "Administrator",
                'dataDesa' => $this->DesaModel->countAllResults(),
                'dataInfo' => $this->InfoDesaModel->countAllResults(),
                'dataAdmin' => $this->AdminModel->countAllResults(),
            ];
            return view('adminView/index', $data);
        }
    }

    public function data_desa()
    {
        foreach ($this->DesaModel->getDesa() as $row) {
            $e[] = $row['id_desa'];
        }
        if (!empty($e)) {
            $d = $this->InfoDesaModel->whereIn('id_desa', $e)->findAll();
            $i[] = 0;
            foreach ($d as $row) {
                $i[] = $row['id_desa'];
            }
            $k = $this->DesaModel->whereNotIn('id_desa', $i)->findAll();
            $data = [
                'username' => "Administrator",
                'dataDesa' => $this->DesaModel->getDesa(),
                'cekDataInfo' => $k,
            ];
            return view('adminView/data_desa', $data);
        } else {
            $data = [
                'username' => "Administrator",
                'dataDesa' => $this->DesaModel->getDesa(),
            ];
            return view('adminView/data_desa', $data);
        }
    }
    public function info_desa($idDesa)
    {
        $data = [
            'username' => "Administrator",
            'dataDesa' => $this->DesaModel->getDesa(),
            'infoDesa' => $this->InfoDesaModel->getInfoDesa($idDesa),

        ];
        return view('adminView/info_desa', $data);
    }
    public function tambah_desa()
    {
        $data = [
            'username' => "Administrator",
            'dataDesa' => $this->DesaModel->getDesa(),
        ];
        return view('adminView/tambah_desa', $data);
    }

    // upload file
    public function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $tmpFile = $_FILES['gambar']['tmp_name'];
        $x = explode('.', $namaFile);
        $extensiFile =  strtolower(end($x));
        $extBenar = array('jpg', 'png', 'jpeg');
        $angakaRandom = rand();
        $namaFileBaru = $angakaRandom . '-' . $namaFile;

        $simpanFile  = 'rumahAdat/' . $namaFileBaru;
        if (in_array($extensiFile, $extBenar) == true) {
            if (move_uploaded_file($tmpFile, $simpanFile)) {
                return $namaFileBaru;
            } else {
                session()->setFlashdata('pesanError', 'gagal upload file');
                // return redirect()->to('/admin/tambah_desa');
            }
        } else {
            session()->setFlashdata('pesanError', 'bukan file gambar');
            // return redirect()->to('/admin/tambah_desa');
        }
    }

    public function save_desa()
    {
        $polygon = $this->request->getPost('polygonArea');
        if ($polygon == NULL) {
            session()->setFlashdata('pesanError', 'Gagagl anda lupa gambar peta ');
            return redirect()->to('/admin/desa');
        }
        $gambar = $this->upload();
        // dd($gambar);
        $data = [
            'nama_desa' => $this->request->getPost('nama_desa'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'polygon' => $polygon,
            'warna_poli' => $this->request->getPost('warna_poli'),
            'gambar' => $gambar,
        ];
        if ($gambar == null) {
            return redirect()->to('/admin/tambah_desa');
        } else {
            $this->DesaModel->save($data);
            session()->setFlashdata('pesanData', 'Berhasil Menambahkan data Baru:) ');
            return redirect()->to('/admin/desa');
        }
    }

    public function edit_desa($id)
    {
        $data = [
            'username' => "Administrator",
            'dataDesa' => $this->DesaModel->getDesa($id),
        ];
        return view('adminView/edit_desa', $data);
    }

    public function saveEdit_desa()
    {
        // dd($_POST, $_FILES);
        $id = $this->request->getPost('id_desa');
        $Desa = $this->DesaModel->getDesa($id);

        $polygon = $this->request->getPost('polygonArea');
        if ($polygon == NULL) {
            session()->setFlashdata('pesanError', 'Gagagl anda lupa gambar peta ');
            return redirect()->to('/admin/desa');
        }
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $this->request->getPost('fileLama');
        } else {
            @unlink('peta/' . $Desa['gambar']);
            $gambar = $this->upload();
        }
        $data = [
            'nama_desa' => $this->request->getPost('nama_desa'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'polygon' => $polygon,
            'gambar' => $gambar,
            'warna_poli' => $this->request->getPost('warna_poli'),
        ];
        if ($polygon == null) {
            return redirect()->to('/admin/tambah_desa');
        } else {
            $this->DesaModel->update($id, $data);
            session()->setFlashdata('pesanData', 'Berhasil Menambahkan data Baru:) ');
            return redirect()->to('/admin/desa');
        }
    }

    public function hapus_desa($id)
    {
        $data = $this->DesaModel->getDesa($id);
        $dataInfo = $this->InfoDesaModel->where(['id_desa' => $id])->first();
        if ($dataInfo != null) {
            unlink('rumahAdat/' . $data['gambar']);
            $this->DesaModel->where(['id_desa' => $id])->delete();
            $this->InfoDesaModel->where(['id_desa' => $id])->delete();

            session()->setFlashdata('pesanData', 'Berhasil Data :) ');
            return redirect()->to('/admin/desa');
        } else {
            unlink('rumahAdat/' . $data['gambar']);
            $this->DesaModel->where(['id_desa' => $id])->delete();

            session()->setFlashdata('pesanData', 'Berhasil Data :) ');
            return redirect()->to('/admin/desa');
        }
    }

    public function save_info()
    {
        $data = [
            'id_desa' => $this->request->getPost('id_desa'),
            'luas_wilayah' => $this->request->getPost('luas_wilayah'),
            'jumlah_pend' => $this->request->getPost('jumlah_pend'),
            'info_lengkap' => $this->request->getPost('info_lengkap'),
        ];
        $this->InfoDesaModel->save($data);
        session()->setFlashdata('pesanData', 'Berhasil Menambahkan data Baru:) ');
        return redirect()->to('/admin/desa');
    }



    public function tambah_info($id)
    {
        $data = [
            'username' => "Administrator",
            'dataDesa' => $this->DesaModel->getDesa($id),
        ];
        return view('adminView/tambah_info', $data);
    }
    public function edit_info($idInfo, $id)
    {
        $data = [
            'username' => 'Administrator',
            'dataDesa' => $this->DesaModel->getDesa($id),
            'dataInfo' => $this->InfoDesaModel->where(['id_info' => $idInfo])->first()
        ];
        return view('adminView/edit_info', $data);
    }

    public function saveEdit_info()
    {
        $idInfo = $this->request->getPost('id_info');
        $idDesa = $this->request->getPost('id_desa');
        $data = [
            'id_desa' => $idDesa,
            'luas_wilayah' => $this->request->getPost('luas_wilayah'),
            'jumlah_pend' => $this->request->getPost('jumlah_pend'),
            'info_lengkap' => $this->request->getPost('info_lengkap'),
        ];
        $this->InfoDesaModel->update($idInfo, $data);
        session()->setFlashdata('pesanData', 'Berhasil Menngubah data:) ');
        return redirect()->to('lihat/' . $idDesa);
    }

    public function viewAdmin()
    {
        $data = [
            'username' => "Administrator",
            'dataAdmin' => $this->AdminModel->getAdmin()
        ];
        return view('adminView/viewAdmin', $data);
    }

    public function saveAdmin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $password2 = $this->request->getPost('password2');

        if ($password !== $password2) {
            session()->setFlashdata('pesanError', 'Gagal password dan konfirmasi password tidak sama');
            return redirect()->to('/admin/viewAdmin');
        } else {
            // enkripsi assword 
            $encPassword = password_hash($password, PASSWORD_DEFAULT);

            $save = $this->AdminModel->save([
                'username' => $username,
                'password' => $encPassword
            ]);
            if ($save == true) {
                session()->setFlashdata('pesanData', 'Berhasil Menambahkan admin ');
                return redirect()->to('/admin/viewAdmin');
            } else {
                session()->setFlashdata('pesanError', 'Gagal simpan ke database');
                return redirect()->to('/admin/viewAdmin');
            }
        }
    }
    public function login()
    {
        $data = [
            'username' => "Administrator",
            'dataAdmin' => $this->AdminModel->getAdmin()
        ];
        return view('adminView/login', $data);
    }
    public function loginProses()
    {
        // dd($_POST);
        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));

        // var_dump($username, $password);
        $sql = $this->AdminModel->where(['username' => $username])->first();
        // dd($sql['username']);
        if ($sql == true) {
            $verifikasi = password_verify($password, $sql['password']);
            if ($verifikasi == true) {
                $_SESSION['username'] = $sql['username'];
                session()->setFlashdata('pesanData', 'Berhasil Menambahkan admin');
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('pesanError', 'Gagal Login');
                return redirect()->to('/admin/login');
            }
        } else {
            session()->setFlashdata('pesanError', 'Gagal Login');
            return redirect()->to('/admin/login');
        }
    }
    public function logoutAdmin()
    {
        session_destroy();
        session_unset();
        return redirect()->to('/');
    }
    //--------------------------------------------------------------------

};
