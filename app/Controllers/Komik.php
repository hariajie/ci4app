<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $mkomik;

    public function __construct()
    {
        $this->mkomik = new KomikModel();
    }

    public function index()
    {
        $komik = $this->mkomik->getKomik();
        $data = [
            'judul' => 'Daftar Komik',
            'komik' => $komik
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->mkomik->getKomik($slug);

        //jika tidak ada di tabel
        if (empty($komik)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan');
        }

        $data = [
            'judul' => 'Detail Komik',
            'komik' => $komik
        ];

        return view('komik/detail', $data);
    }

    public function create()
    {

        $data = [
            'judul' => 'Form Tambah Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/tambah', $data);
    }

    public function save()
    {
        //Validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $this->mkomik->save([
            "judul" => $this->request->getVar("judul"),
            "slug" => url_title($this->request->getVar("judul"), "-", true),
            "penulis" => $this->request->getVar("penulis"),
            "penerbit" => $this->request->getVar("penerbit"),
            "sampul" => $this->request->getVar("sampul"),
        ]);

        session()->setFlashdata("pesan", "Data berhasil ditambah.");


        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->mkomik->delete($id);

        session()->setFlashdata("pesan", "Data berhasil dihapus.");
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'judul' => 'Form Ubah Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->mkomik->getKomik($slug)
        ];

        return view('komik/ubah', $data);
    }

    public function ubah($id)
    {
        //Validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/edit' . $this->request->getVar("slug"))->withInput()->with('validation', $validation);
        }

        $this->mkomik->save([
            "id" => $id,
            "judul" => $this->request->getVar("judul"),
            "slug" => url_title($this->request->getVar("judul"), "-", true),
            "penulis" => $this->request->getVar("penulis"),
            "penerbit" => $this->request->getVar("penerbit"),
            "sampul" => $this->request->getVar("sampul"),
        ]);

        session()->setFlashdata("pesan", "Data berhasil ditambah.");


        return redirect()->to('/komik');
    }
}
