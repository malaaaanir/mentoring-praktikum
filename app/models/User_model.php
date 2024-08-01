<?php

class User_model{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function tambah($data){
        $this->db->query("INSERT INTO mst_user (nama_user, username, password, role) 
                        VALUES (:nama_user, :username, :password, :role)");
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // public function prosesUbah($data){
    //     $this->db->query("UPDATE mst_user 
    //                     SET 
    //                         nama_user = :nama_user, 
    //                         username = :username, 
    //                         password = :password, 
    //                         role = :role 
    //                     WHERE 
    //                         id_user = :id_user;");

    //     $this->db->bind('nama_user', $data['nama_user']);
    //     $this->db->bind('username', $data['username']);
    //     $this->db->bind('password', $data['password']);
    //     $this->db->bind('role', $data['role']);
    //     $this->db->bind('id_user', $data['id_user']);
    
    //     $this->db->execute();
    
    //     return $this->db->rowCount();
    // }
    public function prosesUbah($data){
        $this->db->query("UPDATE mst_user 
                          SET 
                              nama_user = :nama_user, 
                              username = :username, 
                              password = :password, 
                              role = :role 
                          WHERE 
                              id_user = :id_user;");
    
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', isset($data['role']) ? $data['role'] : ''); // Pastikan role tidak kosong jika tidak diubah
        $this->db->bind('id_user', $data['id_user']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function tampil(){
        $this->db->query("SELECT * FROM mst_user ORDER BY id_user ASC");
        
        return $this->db->resultSet();
    }
    public function ubah($id){
        $this->db->query("SELECT * FROM mst_user WHERE id_user = :id");
        $this->db->bind("id", $id);

        return $this->db->single(); 
    }
    public function prosesHapus($id){
        // $this->db->query("DELETE FROM mst_user WHERE id_user = :id");
        $this->db->query("CALL delete_user_with_references(:id)");
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount(); 
    }
    public function detailUser($id){
        $this->db->query("SELECT * FROM mst_user WHERE id_user = :id");
        $this->db->bind("id", $id);
        
        return $this->db->single(); 
    }   
    public function jumlahDataUser() {
        $this->db->query("SELECT COUNT(*) as jumlah FROM mst_user");
        $result = $this->db->single();
        return $result['jumlah'];
    }    
    public function getUserDetails($id_user) {
        $this->db->query("CALL getUserDetails(:id_user)");
        $this->db->bind(':id_user', $id_user);
        $result = $this->db->resultSet();
        
        return $result;
    }
}