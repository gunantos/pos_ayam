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
    protected $useTimestamps = true; 
    protected $validationRules = []; 
    protected $validationMessages = [];
    protected $showOnTable = [];

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
            processFieldDefinition($filed);
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
        if (isset($filed['rules']) && $filed['rules'] && !empty($field['rules'])) {
            $this->validationRules[$fieldName] = $field['rules'] ?? '';
        }
         if (isset($filed['rulesMessage']) && $filed['rulesMessage'] && !empty($field['rulesMessage'])) {
            $this->validationMessages[$fieldName] = $field['rulesMessage'] ?? [];
         }
         if (isset($field['showOnTable']) && $filed['showOnTable']) {
            $this->showOnTable[] = $filed['showOnTable'];
         }
    }

    public function saveData($data)
    {
        if (!$this->validate($this->validationRules, $this->validationMessages)) {
            return false;
        }
        $this->insert($data);
        return $this->getInsertID();
    }
}