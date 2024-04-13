<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // private $mhs = [
    //     [
    //         "nama" => "Ripandy Putra Juamanda Saragih",
    //         "nrp" => "13323003",
    //         "email" => "ripandy12345678@gmail.com",
    //         "jurusan" => "D3 Teknologi Komputer"
    //     ],
    //     [
    //         "nama" => "Roamito Agustina Silaen",
    //         "nrp" => "13323042",
    //         "email" => "romaitosilaen2808@gmail.com",
    //         "jurusan" => "D3 Teknologi Komputer"
    //     ];

        public function getAllMahasiswa()
        {
           $this->db->query('SELECT * FROM ' . $this->table);
           return $this->db->resultSet();
        }

        public function getMahasiswaById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        public function tambahDataMahasiswa($data) {
            $query = "INSERT INTO mahasiswa
                        VALUES
                        ('', :nama, :nrp, :email, :jurusan)";

            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nrp', $data['nrp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);

            $this->db->execute();

            return  $this->db->rowCount();
            
        }

        public function hapusDataMahasiswa($id)
        {
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function ubahDataMahasiswa($data){
            $query = "UPDATE mahasiswa SET
            Nama = :Nama,
            Nrp = :Nrp,
            Email = :Email,
            Jurusan = :Jurusan,
            WHERE Id = :Id";

            $this->db->query($query);
            $this->db->bind('Nama', $data['Nama']);
            $this->db->bind('Nrp', $data['Nrp']);
            $this->db->bind('Email', $data['Email']);
            $this->db->bind('Jurusan', $data['Jurusan']);
            $this->db->bind('Id', $data['Id']);

            $this->db->execute()
;

return $this->db->rowCount();
}

public function cariDataMahasiswa()
{
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE Nama LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
}
}