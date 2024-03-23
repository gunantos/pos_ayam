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
    
        $nm = str_replace('-', '_', $nm);
        $nm = \explode('_', $nm);
        $cls = '';
        for($i = 0; $i < sizeof($nm); $i++) {
            $cls .= ucfirst($nm[$i]);
        }
        if (empty($cls)) {
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $cls = '\\App\\Models\\'. $cls;
        if (!class_exists($cls)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return (new $cls());
    }

    public function delete($fungsi, $id) {
        if (empty($id)) {
             return $this->response->setStatusCode(200)->setJSON(['status'=>false, 'message'=>'Tentukan data yang ingin dihapus']);
        }
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
        $filds = $model->allowedFileds();
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
        if (sizeof($data) < 1) {
            return $this->response->setStatusCode(200)->setJSON(['status'=>false, 'message'=>'Data masih kosong']);
        }
        if ($model->saveData($data, $id)) {
            return $this->response->setStatusCode(200)->setJSON(['status'=>true, 'message'=>'Berhasil '. $f .' Data']);
        } else {
            return $this->response->setStatusCode(200)->setJSON(['status'=>false, 'message'=>'Gagal '. $f .' Data']);
        }
    }

    public function get($fungsi, $id=null) {
        $model = $this->initModel($fungsi);
        $start = 0;
        $length = 10;
        $search = $this->request->getGet('search');
        $order = $this->request->getGet('order');
        $allowSearch = [];
        
        foreach($model->myfields() as $key) {
            if (isset($key['allowed_search']) && $key['allowed_search']) {
                array_push($allowSearch, $key['name']);
            }
        }

        if (!empty($this->request->getGet('start'))) {
            $start = $this->request->getGet('start');
        }
        if (!empty($this->request->getGet('length'))) {
            $length = $this->request->getGet('length');
        }
        if (!empty($id)) {
            $result =  $model->findOne($id);
            return $this->response->setStatusCode(200)->setJSON(['status' => true, 'data' => $result]);
        } else {
            // Set kondisi pencarian jika ada
            if (!empty($search)) {
                // Misalnya, implementasi pencarian pada satu kolom
                if (isset($search['value']))  {
                    $search = $search['value'];
                }
                if (!empty($search)) {
                    for($i = 0; $i < sizeof($allowSearch); $i++) {
                        if ($i == 0) {
                            $model->like($allowSearch[$i], $search);
                        } else {
                            $model->orLike($allowSearch[$i], $search);
                        }
                    }
                }
            }

            // Set kondisi pengurutan jika ada
            if (!empty($order)) {
                if (isset($order[0])) {
                    $clmn = isset($order[0]['column']) ? $order[0]['column'] : '';
                    $direct = isset($order[0]['dir']) ? $order[0]['dir'] : 'ASC';
                    if (!empty($clmn)) {
                        $model->orderBy($clmn, $direct);
                    }
                }
            }

            // Menghitung total data
            $totalData = $model->countAllResults();

            // Menerapkan paginasi
            $model->limit($length, $start);

            // Mendapatkan data hasil query
            $result = $model->findAll();

            // Mengembalikan response dengan format yang sesuai untuk DataTables
            return $this->response->setStatusCode(200)->setJSON([
                'draw'            => intval($this->request->getGet('draw')),
                'recordsTotal'    => $totalData,
                'recordsFiltered' => $totalData, // Untuk sederhana, sama dengan totalData
                'data'            => $result,
            ]);
        }
    }
    
    public function chartDashboard($fungsi) {
        $model = $this->initModel($fungsi);
        if (method_exists($model, 'grafikHarian') && method_exists($model, 'grafikBulanan')) {
            $harian = $model->grafikHarian();
            $bulan = $model->grafikBulanan();
            return $this->response->setStatusCode(200)->setJSON(['status'=>true, 'harian'=>$harian, 'bulan'=>$bulan]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}