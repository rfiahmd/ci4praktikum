<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurusan extends Model
{
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jurusan'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; // Ubah ke true jika ada kolom created_at dan updated_at
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // public function getAllJurusan()
    // {
    //     return $this->findAll(); // Mengambil semua data dari tabel jurusan
    // }

    public function getAllJurusan()
    {
        return $this->select('jurusan.*, COUNT(mahasiswa.id) AS jumlah_mhs')
            ->join('mahasiswa', 'mahasiswa.jurusan_id = jurusan.id', 'left') // Join tabel mahasiswa dengan jurusan
            ->groupBy('jurusan.id') // Kelompokkan berdasarkan ID jurusan
            ->findAll();
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'jurusan_id', 'id'); // Sesuaikan dengan nama kolom relasi yang ada
    }
}
