<?php

class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
       $this->db = new Database(); 
    }
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table. ' WHERE id=:id');
        $this->db->bind('id', $id); 
        return $this->db->resultSet();
    }

    // method menambah data user baru
    public function tambahDataUser($data) {
        $query = "INSERT INTO ". $this->table. "(name, email) VALUES (:name, :email)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();
        // mengambil jumlah baring yang terpengaruh
        return $this->db->rowCount();
    }
    public function ubahDataUser($data) {
        $query = "UPDATE ". $this->table. "SET 
                    name = :name, 
                    email = :email 
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDatauser($id) {
        $query = "DELETE FROM ". $this->table. " WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        // mengambil jumlah baring yang terpengaruh
        return $this->db->rowCount();
    }
}
