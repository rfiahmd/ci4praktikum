<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        // Membuat tabel 'mahasiswa'
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'unique' => true, // NIM harus unik
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'jurusan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'alamat' => [
                'type' => 'TEXT', // Menggunakan TEXT untuk menyimpan alamat panjang
                'null' => true, // Membolehkan null jika tidak diisi
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15', // Batas maksimal no telepon
                'null' => true,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255', // Menyimpan path file foto
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addPrimaryKey('id');

        // Menambahkan foreign key untuk kolom 'jurusan_id'
        $this->forge->addForeignKey('jurusan_id', 'jurusan', 'id', 'CASCADE', 'CASCADE');

        // Membuat tabel di database
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        // Menurunkan tabel 'mahasiswa'
        $this->forge->dropTable('mahasiswa');
    }
}
