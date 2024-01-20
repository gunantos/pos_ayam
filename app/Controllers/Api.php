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

class Api extends BaseController
{
    private function respond($status, $message, $data = null)
    {
        return $this->response->setStatusCode(200)->setJSON(['status'=>$status, 'message'=>$message, 'data'=>$data]);
    }
    private function initModel($nm) {
        $nm = split('-', $nm);
        $cls = '';
        for($i = 0; $i < sizeof($nm); $i++) {
            $cls .= ucfirst($nm[$i]);
        }
        if (empty($cls)) {
            return $this->respond(false, 'Fungsi tidak diketahui');
        }
        $cls = '\\App\\Models\\'. $cls;
        if (!class_exists($cls)) {
            return $this->respond(false, 'Metode tidak diketahui');
                }
        return (new $cls());
    }

    public function delete($fungsi, $id) {
        $model = $this->initModel($fungsi);
        if ($model->delete($id)) {
            return $this->response->setStatusCode(200)->setJSON(['status'=>true, 'message'=>'Berhasil menghapus data']);
        }else{
            return $this->response->setStatusCode(200)->setJSON(['status'=>false, 'message'=>'Gagal menghapus data']);
        }
    }

    public function save($fungsi, $id = '') 
    {
        $model = $this->initModel($fungsi);
        $filds = $model->allowedFields();
        $data = [];
        for($i=0; $i < sizeof($filds); $i++) 
        {
            $data[$filds[$i]] = $this->request->getPost($filds[$i]);
        }
        if (empty($id)) {
            $f = 'Menambahkan';
        } else {
            $f = 'Mengubah';
        }
        if ($model->saveData($save, $id)) {
            return $this->response->setStatusCode(200)->setJSON(['status'=>true, 'message'=>'Berhasil '. $f .' Data']);
        } else {
            return $this->response->setStatusCode(200)->setJSON(['status'=>false, 'message'=>'Gagal '. $f .' Data']);
        }
    }

    public function get()
}