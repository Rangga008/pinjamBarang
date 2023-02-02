<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;


class Login extends BaseController
{
    public function index()
    {
        session();
        return view('login/login');
    }

    public function proses()
    {

        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');

        $dataPengguna = new ModelPengguna();
        $cek = $dataPengguna
            ->where('email', $email)
            ->first();

        if ($cek) {
            # Jika email terdaftar
            if (password_verify($pass, $cek->pass)) {
                # Jika password benar

                if ($cek->level == '2') {
                    # code...
                    session()->set('email', $email);
                    session()->set('level', 'adm');
                    return redirect()->to('admin');
                } else {
                    # code...
                    session()->set('email', $email);
                    session()->set('level', 'usr');
                    return redirect()->to('user');
                }
            } else {
                # Jika password salah
                session()->setFlashdata('pesan', 'Password yang anda masukkan salah');
                return redirect()->to('login');
            }
        } else {
            # Jika user tidak ditemukan
            session()->setFlashdata('pesan', 'Email tidak terdaftar');
            return redirect()->to('login');
        }
    }
}
