<?php

class Login_model {
    private $table = 'mst_user';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getRole($username) {
        $this->db->query('SELECT role FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);        
        return $this->db->single();
    }
    public function getNamaUser($username) {
        $this->db->query('SELECT nama_user FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);    
        $result = $this->db->single();
    
        if ($result) {
            return $result['nama_user'];
        } else {
            return false;
        }
    }
    public function isDefaultPassword($password) {
        $defaultPasswords = ['Admin', 'Dosen', 'Asisten'];
        
        return in_array($password, $defaultPasswords);
    }

    public function validateLogin($username, $password) {
        $this->db->query("SELECT id_user, password 
                        FROM 
                            mst_user 
                        WHERE 
                            username = :username and password = :password");
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);

        $result = $this->db->single();

        if ($result) {
            return $result['id_user'];
        }
        else {
            return false;
        }
    }

}