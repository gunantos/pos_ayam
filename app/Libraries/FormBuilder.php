<?php

namespace App\Libraries;

class FormBuilder
{
    protected $validation;
    protected $formData;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function createForm($formData, $backUrl = null)
    {
        $this->formData = $formData;

        // Buat form opening tag
        $form = form_open();

        // Loop melalui array formData untuk membuat input fields
        foreach ($this->formData as $field) {
            if (isset($field['type'])) {
                // Tipe elemen formulir yang diizinkan
                $allowedTypes = ['text', 'number', 'select', 'textarea', 'checkbox', 'email', 'password', 'hidden', 'date', 'radio', 'file', 'url', 'color', 'range'];

                if (!in_array($field['type'], $allowedTypes)) {
                    // Tipe tidak valid, lewati
                    continue;
                }

                // Validasi apakah setiap field memiliki konfigurasi yang benar
                if (isset($field['name']) && isset($field['label']) && isset($field['rules'])) {
                    // Ambil nilai default jika diset
                    $value = $this->validation->set_value($field['name']);

                    // Buat label
                    $label = form_label($field['label'], $field['name']);

                    // Tipe elemen formulir
                    $type = $field['type'];

                    // Buat elemen formulir berdasarkan tipe
                    $element = $this->createElement($type, $field);

                    // Tampilkan pesan error jika ada
                    $error = $this->validation->getError($field['name']);

                    // Tambahkan field, label, input, dan error ke form
                    $form .= "<div class='form-group'>";
                    $form .= $label;
                    $form .= $element;
                    $form .= "<div class='text-danger'>$error</div>";
                    $form .= "</div>";
                }
            }
        }

        // Tambahkan tombol submit
        $submit = form_submit([
            'name' => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-primary', // Atur class sesuai kebutuhan
        ]);
        if ($backUrl) {
            $backButton = anchor($backUrl, 'Back', ['class' => 'btn btn-secondary']);
            $form .= $backButton;
        }
        // Tambahkan form closing tag
        $form .= $submit;
        $form .= form_close();

        return $form;
    }

    protected function createElement($type, $field)
    {
        switch ($type) {
            case 'text':
            case 'number':
            case 'email':
            case 'password':
            case 'hidden':
            case 'date':
            case 'url':
            case 'color':
            case 'range':
                return form_input([
                    'name' => $field['name'],
                    'value' => $this->validation->set_value($field['name']),
                    'class' => 'form-control',
                    'type' => $type,
                ]);
            case 'select':
                return form_dropdown($field['name'], $field['options'], $this->validation->set_value($field['name']), 'class="form-control"');
            case 'textarea':
                return form_textarea([
                    'name' => $field['name'],
                    'value' => $this->validation->set_value($field['name']),
                    'class' => 'form-control',
                ]);
            case 'checkbox':
                return form_checkbox([
                    'name' => $field['name'],
                    'value' => $field['value'] ?? '',
                    'checked' => $this->validation->set_checkbox($field['name'], $field['value'] ?? ''),
                ]);
            case 'radio':
                return form_radio([
                    'name' => $field['name'],
                    'value' => $field['value'] ?? '',
                    'checked' => $this->validation->set_radio($field['name'], $field['value'] ?? ''),
                ]);
            case 'file':
                return form_upload([
                    'name' => $field['name'],
                    'value' => $this->validation->set_value($field['name']),
                    'class' => 'form-control-file',
                ]);
            // Tambahkan jenis elemen formulir lainnya sesuai kebutuhan
            default:
                return '';
        }
    }
}
