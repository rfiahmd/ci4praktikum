<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use CodeIgniter\HTTP\ResponseInterface;

class JurusanController extends BaseController
{
    public function index()
    {
        $model = new Jurusan();

        $data = [
            'title' => 'Data Jurusan',
            'jurusan' => $model->getAllJurusan()
        ];
        return view('admin/jurusan/jurusan_view', $data);
    }

    public function store()
    {
        $model = new Jurusan();

        $validationMessages = [
            'nama_jurusan' => [
                'required' => 'Jurusan harus diisi.',
                'is_unique' => 'Jurusan sudah terdaftar.',
                'min_length' => 'Nama Jurusan harus lebih dari 5 karakter.'
            ]
        ];

        if (!$this->validate([
            'nama_jurusan' => 'required|is_unique[jurusan.nama_jurusan]|min_length[5]'
        ], $validationMessages)) {
            return redirect()->to('/jurusan')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_jurusan' => $this->request->getPost('nama_jurusan')
        ];

        if ($model->save($data)) {
            session()->setFlashdata('success', 'Data Jurusan berhasil disimpan.');
        } else {
            session()->setFlashdata('error', 'Gagal menyimpan data jurusan.');
        }

        return redirect()->to('/jurusan');
    }

    public function update($id)
    {
        $model = new Jurusan();

        $validationMessages = [
            'nama_jurusan' => [
                'required' => 'Nama jurusan harus diisi.',
                'is_unique' => 'Nama jurusan sudah terdaftar.',
                'min_length' => 'Nama jurusan harus lebih dari 5 karakter.'
            ]
        ];

        if (!$this->validate(['nama_jurusan' => 'required|is_unique[jurusan.nama_jurusan,id,{id}]|min_length[5]'], $validationMessages)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'nama_jurusan' => $this->request->getPost('nama_jurusan')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/jurusan')->with('success', 'Data jurusan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data jurusan.');
        }
    }


    public function delete($id)
    {
        // Inisialisasi model dalam metode
        $jurusanModel = new Jurusan();
        $mahasiswaModel = new Mahasiswa();
        
        // Cari jurusan berdasarkan ID
        $jurusan = $jurusanModel->find($id);
        
        // Jika jurusan tidak ditemukan, kembalikan pesan error
        if (!$jurusan) {
            return $this->response->setJSON(['success' => false, 'message' => 'Jurusan tidak ditemukan.']);
        }

        // Cek apakah ada mahasiswa yang terdaftar di jurusan ini
        $mahasiswaCount = $mahasiswaModel->where('jurusan_id', $id)->countAllResults();
        
        if ($mahasiswaCount > 0) {
            // Jika ada mahasiswa terdaftar, kembalikan pesan error
            return $this->response->setJSON(['success' => false, 'message' => 'Jurusan ini masih memiliki mahasiswa terdaftar.']);
        }

        // Jika tidak ada mahasiswa terdaftar, hapus jurusan
        $jurusanModel->delete($id);

        // Kembalikan respons sukses
        return $this->response->setJSON(['success' => true, 'message' => 'Jurusan telah dihapus.']);
    }
}
