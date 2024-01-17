<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->_render('dashboard');
    }
    
    public function penjualan(): string
    {
        return $this->_render('penjualan');
    }

    public function ayam_masuk(): string
    {
        return $this->_render('ayam_masuk');
    }

    public function ayam_mati(): string
    {
        return $this->_render('ayam_mati');
    }

    public function omset(): string
    {
        return $this->_render('omset');
    }
    public function pengeluaran(): string
    {
        return $this->_render('pengeluaran');
    }
    public function keuangan(): string
    {
        return $this->_render('keuangan');
    }
}
