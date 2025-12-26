<?php

class User extends Controller {
  public function index() {
    $data["judul"] = "Data user";
    $data['users'] = $this->model('User_model')->getAllUser();
    $this->view('list', $data);
  }
  public function detail($id) {
    $data["judul"] = "Detail user";
    $data['users'] = $this->model('User_model')->getUserById($id);
    $this->view('detail', $data);
  }

  // method untuk crate data
  public function tambah() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->model('User_model')->tambahDataUsers($_POST) > 0) {
        header('Location: '. BASEURL. '/user');
        exit;
      }
    } else {
      $data["judul"] = "Tambah Data User";
      $this->view('tambah', $data);
    }
  }

  // method untuk Update data
  public function ubah($data) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
        header(('Location: '.BASEURL. '/user'));
        exit;
      }
    } else {
      $data["judul"] = "Ubah Data user";
      $data['users'] = $this->model('User_model')->getUserById($data);
      $this->view('ubah', $data);
    }
  }

  //method untuk Delete data
  public function hapus($id) {
    if ($this->model('User_model')->hapusDataUser($id) > 0) {
      header(('Location: '.BASEURL. '/user'));
      exit;
    }
  }
}
?>