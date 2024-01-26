<?php

namespace App\Controllers;
use App\Models\AyamMasuk;
use App\Models\AyamMati;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Setoran;
use App\Models\Keuangan;
use App\Models\Pelanggan;
use App\Models\Omset;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->_render('dashboard');
    }
    
    public function penjualan(): string
    {
        return $this->autoPage('Penjualan', (new Penjualan()), '');
    }

    public function ayam_masuk(): string
    {
        return $this->autoPage('Ayam Masuk', (new AyamMasuk()), 
        '');
    }

    public function ayam_mati(): string
    {
        return $this->autoPage('Ayam Mati', (new AyamMati()));
    }

    public function omset(): string
    {
        return $this->autoPage('Omset', (new Omset()));
    }
    public function pengeluaran(): string
    {
       return $this->autoPage('Pengeluaran', (new Pengeluaran()));
    }
    public function keuangan(): string
    {
       return $this->autoPage('Keuangan', (new Keuangan()));
    }
}
