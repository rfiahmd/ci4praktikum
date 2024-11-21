<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jurusan;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new Mahasiswa();

        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->getAllMahasiswa()
        ];
        return view('admin/mahasiswa/mahasiswa_view', $data);
    }

    public function create()
    {
        $modelJurusan = new Jurusan();
        $data = [
            'title' => 'Tambah Mahasiswa',
            'jurusan' => $modelJurusan->findAll()
        ];

        return view('admin/mahasiswa/mahasiswa_create', $data);
    }

    public function store()
    {
        $model = new Mahasiswa();

        // Mengambil file foto
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/foto', $fotoName);
        } else {
            // Jika foto gagal diupload
            session()->setFlashdata('error', 'Foto gagal diupload.');
            return redirect()->to('/mahasiswa/tambah')->withInput();
        }

        // Mengambil data dari form
        $data = [
            'nim'           => $this->request->getPost('nim'),
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jurusan_id'    => $this->request->getPost('jurusan_id'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_telepon'    => $this->request->getPost('no_telepon'),
            'foto'          => $fotoName,
        ];

        

        // Simpan data ke database
        if ($model->save($data)) {
            session()->setFlashdata('success', 'Data mahasiswa berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data mahasiswa.');
            return redirect()->back()->withInput()->with('validation', $model->errors());
            // return redirect()->to('/mahasiswa/tambah')->withInput()->with('validation', $model->errors());
        }

        return redirect()->to('/mahasiswa');
    }

    public function edit($id)
    {
        $mahasiswaModel = new Mahasiswa();
        $jurusanModel = new Jurusan();

        $mahasiswa = $mahasiswaModel->find($id);

        if (!$mahasiswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Mahasiswa dengan ID $id tidak ditemukan.");
        }

        $jurusan = $jurusanModel->findAll();

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'jurusan' => $jurusan
        ];

        return view('admin/mahasiswa/mahasiswa_edit', $data);
    }

    public function update($id)
    {
        //
    }

    public function detail($id)
    {
        $model = new Mahasiswa();
        $mahasiswa = $model->detailMhs($id);

        // Mengambil data mahasiswa berdasarkan ID
        // $mahasiswa = $model->find($id);
        // $mahasiswa = $model->where('mahasiswa.id', $id)->first();

        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        if (!$mahasiswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Mahasiswa dengan ID $id tidak ditemukan.");
        }

        return view('admin/mahasiswa/mahasiswa_detail', $data);
    }
}
