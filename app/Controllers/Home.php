<?php

namespace App\Controllers;
use App\Models\AyamMasuk;
use App\Models\AyamMati;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
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
        return $this->autoPage('Ayam Masuk', (new AyamMasuk()), 
        '<tr><th rowspan="2">No</th><th rowspan="2">TANGGAL</th><th colspan="3">BESAR</th><th colspan="3">KECIL</th></tr>
         <tr><th>EKOR</th><th>KG</th><th>KG (TU)</th><th>EKOR</th><th>KG</th><th>KG (TU)</th></tr>0
        ');
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
