<?php

namespace App\Libraries;

class FormBuilder
{
    public static function createForm($formData, $backUrl = null, $hidemodal = false)
    {
        helper(['form']);

        $validation = \Config\Services::validation();
        $formData = $formData;

        // Buat form opening tag
        $form = form_open();

        // Loop melalui array formData untuk membuat input fields
        foreach ($formData as $field) {
            if (isset($field['type'])) {
                // Tipe elemen formulir yang diizinkan
                $allowedTypes = ['text', 'number', 'select', 'textarea', 'checkbox', 'email', 'password', 'hidden', 'date', 'radio', 'file', 'url', 'color', 'range'];

                if (!in_array($field['type'], $allowedTypes)) {
                    // Tipe tidak valid, lewati
                    continue;
                }

                // Validasi apakah setiap field memiliki konfigurasi yang benar
                if (isset($field['name']) && isset($field['label']) && isset($field['rules'])) {

                    // Buat label
                    $label = form_label($field['label'], $field['name']);

                    // Tipe elemen formulir
                    $type = $field['type'];

                    // Buat elemen formulir berdasarkan tipe
                    $element = self::createElement($type, $field);

                    // Tampilkan pesan error jika ada
                    $error = $validation->getError($field['name']);

                    // Tambahkan field, label, input, dan error ke form
                    $form .= "<div class='form-group'>";
                    $form .= $label;
                    $form .= $element;
                    $form .= "<div class='text-danger'>$error</div>";
                    $form .= "</div>";
                }
            }
        }

        $form .= '<div class="d-flex justify-content-between">';
        // Tambahkan tombol submit
        $submit = form_submit([
            'name' => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-primary',
        ]);
        if ($backUrl) {
            $backButton = anchor($backUrl, 'Cancel', ['class' => 'btn btn-warning']);
        }else if ($hidemodal) {
             $backButton = anchor('#', 'Cancel', ['class' => 'btn btn-warning']);
        }
            $form .= $backButton;
        $form .= $submit;
        $form .= "</div>";
        // Tambahkan form closing tag
        $form .= form_close();

        return $form;
    }

    protected static function createElement($type, $field)
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
                    'value' => isset($field['value']) ?? '',
                    'class' => 'form-control',
                    'type' => $type,
                ]);
            case 'select':
                return form_dropdown($field['name'], $field['options'], isset($field['value']) ?? '', 'class="form-control"');
            case 'textarea':
                return form_textarea([
                    'name' => $field['name'],
                    'value' => isset($field['value']) ?? '',
                    'class' => 'form-control',
                ]);
            case 'checkbox':
                return form_checkbox([
                    'name' => $field['name'],
                    'value' => $field['value'] ?? '',
                    'checked' => $validation->set_checkbox($field['name'], $field['value'] ?? ''),
                ]);
            case 'radio':
                return form_radio([
                    'name' => $field['name'],
                    'value' => $field['value'] ?? '',
                    'checked' => $validation->set_radio($field['name'], $field['value'] ?? ''),
                ]);
            case 'file':
                return form_upload([
                    'name' => $field['name'],
                    'value' => isset($field['value']) ?? '',
                    'class' => 'form-control-file',
                ]);
            // Tambahkan jenis elemen formulir lainnya sesuai kebutuhan
            default:
                return '';
        }
    }
}
