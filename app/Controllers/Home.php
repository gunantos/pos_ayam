<?php

namespace App\Controllers;
use App\Models\AyamMasuk;
use App\Models\AyamMati;
use App\Models\Pengeluaran;
use App\Models\Setoran;
use App\Models\Piutang;
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
        $data = [
            'title'=>'Penjualan',
            'model'=>new Penjualan()
        ];
        return $this->_render('AutoPage', $data);
    }

    public function ayam_masuk(): string
    {
        return $this->autoPage('Ayam Masuk', (new AyamMasuk()));
    }

    public function ayam_mati(): string
    {
        return $this->autoPage('Ayam Mati', (new AyamMasuk()));
    }

    public function omset(): string
    {
        return $this->autoPage('Omset', (new AyamMasuk()));
    }
    public function pengeluaran(): string
    {
       return $this->autoPage('Pengeluaran', (new AyamMasuk()));
    }
    public function keuangan(): string
    {
        return $this->_render('keuangan');
    }
}
