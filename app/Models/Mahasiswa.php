<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'nama',
        'nim',
        'jenis_kelamin',
        'jurusan_id',
        'foto',
        'alamat',
        'no_telepon'
    ];

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
    protected $validationRules = [
        'nim'           => 'required|numeric|is_unique[mahasiswa.nim]',
        'nama'          => 'required|min_length[3]',
        'jenis_kelamin' => 'required|in_list[L,P]',
        'jurusan_id'    => 'required',
        'alamat'        => 'required',
        'no_telepon'    => 'required|numeric|max_length[15]',
        'foto'          => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
    ];

    protected $validationMessages = [
        'nim' => [
            'required'  => 'NIM mahasiswa harus diisi.',
            'numeric'   => 'NIM harus berupa angka.',
            'is_unique' => 'NIM sudah terdaftar.',
        ],
        'nama' => [
            'required'    => 'Nama mahasiswa harus diisi.',
            'min_length'  => 'Nama mahasiswa harus lebih dari 3 karakter.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih.',
            'in_list'  => 'Jenis kelamin harus Laki-Laki (L) atau Perempuan (P).',
        ],
        'jurusan_id' => [
            'required'           => 'Jurusan harus dipilih.',
            'is_natural_no_zero' => 'Jurusan tidak valid.',
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi.',
        ],
        'no_telepon' => [
            'required'   => 'Nomor telepon harus diisi.',
            'numeric'    => 'Nomor telepon harus berupa angka.',
            'max_length' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
        ],
        'foto' => [
            'uploaded' => 'Foto harus diunggah.',
            'mime_in'  => 'Foto harus berupa file dengan format jpg, jpeg, atau png.',
            'max_size' => 'Ukuran foto maksimal 2MB.',
        ],
    ];
    protected $skipValidation       = true;
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

    public function getAllMahasiswa()
    {
        return $this->select('mahasiswa.*, jurusan.nama_jurusan')
            ->join('jurusan', 'jurusan.id = mahasiswa.jurusan_id')
            ->findAll();
    }

    public function detailMhs($id)
    {
        return $this->select('mahasiswa.*, jurusan.nama_jurusan')
            ->join('jurusan', 'jurusan.id = mahasiswa.jurusan_id')
            ->where('mahasiswa.id', $id)
            ->first();
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id'); // Sesuaikan dengan nama kolom relasi yang ada
    }
}
