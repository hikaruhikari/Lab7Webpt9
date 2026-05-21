<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
use App\Models\ArtikelModel; // Mengonfirmasi bahwa Controller ini memanggil model kamu

class Ajax extends Controller
{
    // Fungsi untuk menampilkan halaman utama AJAX (View)
    public function index()
    {
        $data = [
        'title' => 'Halaman AJAX Artikel'
        ];

        return view('ajax/index', $data); // Ini mengarah ke app/Views/ajax/index.php
    }

    // Fungsi untuk mengambil semua data artikel dan mengirimkannya dalam bentuk JSON
    public function getData()
    {
        $model = new ArtikelModel();
        $data = $model->findAll();
        
        // Kirim data dalam format JSON ke browser
        return $this->response->setJSON($data);
    }

    // Fungsi untuk menghapus data artikel berdasarkan ID
    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        
        $data = [
            'status' => 'OK'
        ];
        
        // Kirim respon sukses dalam format JSON
        return $this->response->setJSON($data);
    }
}