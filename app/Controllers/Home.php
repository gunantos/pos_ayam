<?php

namespace App\Controllers;
use App\Models\AyamMasuk;
use App\Models\AyamMati;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Keuangan;
use App\Models\Pelanggan;
use App\Models\Omset;

class Home extends BaseController
{
    public function index(): string
    {
        $totalPenjualan = 0; 
        $totalPenjualanHariIni = 0; 
        $totalPenjualanBulanIni = 0; //
        $totalPengeluaran = 0;
        $setoranTransfer = 0;
        $setoranTunai = 0;
         $penjualan = (new Penjualan())->select('SUM(besar_berat + kecil_berat) as total_penjualan')->get();
        if ($penjualan) {
            $result = $penjualan->getRow();
            $totalPenjualan = $result->total_penjualan;
        }
         $penjualanHariIni = (new Penjualan())->select('SUM(besar_berat + kecil_berat) as total_penjualan')->where('tanggal', date('Y-m-d'))->get();
        if ($penjualanHariIni) {
            $resultHariIni = $penjualanHariIni->getRow();
            $totalPenjualanHariIni = $resultHariIni->total_penjualan;
        }
         $penjualanBulanIni = (new Penjualan())->select('SUM(besar_berat + kecil_berat) as total_penjualan')->where('MONTH(tanggal)', date('m'))->get();
        if ($penjualanBulanIni) {
            $resultBulanIni = $penjualanBulanIni->getRow();
            $totalPenjualanBulanIni = $resultBulanIni->total_penjualan;
        }
         $pengeluaran = (new Pengeluaran())->select('SUM(kandang + kantor + ayam) as total')->get();
        if ($pengeluaran) {
            $result = $pengeluaran->getRow();
            $totalPengeluaran = $result->total;
        }
        
         $keuangan = (new Keuangan())->select('SUM(setoran_tunai) as ttl_tunai, SUM(setoran_transfer) as ttl_transfer')->get();
        if ($keuangan) {
            $result = $keuangan->getRow();
            $setoranTunai = $result->ttl_tunai;
            $setoranTransfer = $result->ttl_transfer;
        }
        return $this->_render('dashboard', 
        [
            'title'=>'Dashboard',
            'totalPenjualan'=>(int) $totalPenjualan,
            'totalPenjualanHariIni'=>(int) $totalPenjualanHariIni,
            'totalPenjualanBulanIni'=>(int) $totalPenjualanBulanIni,
            'totalPengeluaran'=>(int) $totalPengeluaran,
            'setoranTunai'=>(int) $setoranTunai,
            'setoranTransfer'=>(int) $setoranTransfer

        ]);
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
