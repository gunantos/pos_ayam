<?php

namespace App\Models;
use CodeIgniter\Model;

interface MyModel_interface {
    public function myfields() : array;
}

class MyModel extends Model implements MyModel_interface {
    protected $table = ''; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = []; 
    protected $showOnTable = [];

    // Dates
    protected $useTimestamps = true; 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = []; 
    protected $validationMessages = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function showOnTable() {
        return $this->showOnTable;
    }
    /**
     * Mendefinisikan struktur fields untuk model ini.
     * Setiap elemen array mewakili informasi mengenai satu kolom dalam tabel database.
     *
     * Struktur setiap elemen array:
     * - 'name': Nama kolom dalam tabel database.
     * - 'label': Label yang dapat digunakan pada formulir atau tampilan.
     * - 'primaryKey': Menentukan apakah kolom ini adalah primary key (kunci utama) atau bukan.
     * - 'allowed': Menentukan apakah kolom ini diperbolehkan untuk diisi atau tidak.
     * - 'rules': Aturan validasi CodeIgniter yang akan diterapkan pada kolom ini.
     * - 'rulesMessage': Pesan kesalahan validasi yang terkait dengan aturan-aturan tersebut.
     * - 'type': Jenis field atau tipe elemen formulir (misalnya: 'text', 'password', 'checkbox', dll.).
     *
     * Contoh:
     * [
     *     'name' => 'field1',
     *     'label' => 'Field 1',
     *     'primaryKey' => false,
     *     'allowed' => true,
     *     'rules' => 'required',
     *     'rulesMessage' => ['required' => 'Wajib diisi'],
     *     'type' => 'text',
     *      'showOnTable'=>true
     * ],
     *
     * @return array
     */
    public function myfields() : array
    {
        return [];
    }

    public function __construct() {
        parent::__construct();
        foreach($this->myfields() as $filed) {
            $this->processFieldDefinition($filed);
        }
    }

    protected function processFieldDefinition($field)
    {
        $fieldName = $field['name'];
        if (isset($field['primaryKey'])) {
        $this->primaryKey = $field['primaryKey'] ?? $this->primaryKey;
        }
        if (isset($field['allowed']) && $field['allowed']) {
            $this->allowedFields[] = $fieldName;
        }
        if (isset($field['rules']) && $field['rules'] && !empty($field['rules'])) {
            $this->validationRules[$fieldName] = $field['rules'] ?? '';
        }
         if (isset($field['rulesMessage']) && $field['rulesMessage'] && !empty($field['rulesMessage'])) {
            $this->validationMessages[$fieldName] = $field['rulesMessage'] ?? [];
         }
         if (isset($field['showOnTable']) && $field['showOnTable']) {
            $this->showOnTable[] = $field['showOnTable'];
         }
    }

    public function saveData($data)
    {
        // Cek apakah 'id_user' termasuk dalam allowedFields
        if (in_array('id_user', $this->allowedFields)) {
            // Jika 'id_user' termasuk dalam allowedFields
            // Cek apakah 'id_user' ada dalam data sebelum create
            if (!array_key_exists('id_user', $data)) {
                // Jika 'id_user' tidak ada dalam data, buat id user dari myth user
                // Misalnya, Anda dapat menggunakan cara berikut untuk mendapatkan id user dari Myth: auth()->id
                $data['id_user'] = auth()->id ?? null;
            }
        }

        // Lakukan validasi sebelum menyimpan data
        if (!$this->validate($this->validationRules, $this->validationMessages)) {
            return false;
        }

        // Lakukan proses insert data
        $this->insert($data);

        // Kembalikan ID dari data yang baru saja di-insert
        return $this->getInsertID();
    }
}