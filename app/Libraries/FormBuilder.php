<?php

namespace App\Libraries;

class FormBuilder
{
    protected static $allowedTypes = ['text', 'number', 'select', 'textarea', 'checkbox', 'email', 'password', 'hidden', 'date', 'radio', 'file', 'url', 'color', 'range', 'decimal'];
    public static function createForm($formData, $backUrl = null, $hidemodal = false)
    {
        helper(['form']);

        $formData = $formData;
        


        // Buat form opening tag
        $form = form_open('#', ['class'=>'', 'id'=>'formData']);
        $onform = [];
        foreach($formData as $key) {
            $showon =false;
            if (\in_array($key['type'], self::$allowedTypes)) {
                $showon = true;
            }
            if ($showon) {
                if (isset($key['group_input']) && !empty($key['group_input'])) {
                    $findindex = array_search($key['group_input'], array_column($onform, 'name'));
                    if ($findindex !== false) {
                        $onform[$findindex]['item_form'][] = $key;
                    } else {
                        $onform[] = ['name'=>$key['group_input'], 'item_form'=>[$key]];
                    }
                                        
                } else {
                    $onform[] = $key;
                }
            }
        }

        // Loop melalui array formData untuk membuat input fields

        $form_row = '';
        foreach ($onform as $field) {
            if (isset($field['item_form'])) {
                $i = 0;
                foreach($field['item_form'] as $fld) {
                    if ($i == 0) {
                        $form_row .="<div class='col-12 col-sm-6'><div class='card border-primary'><h5 class='card-header'>". $field['name'] ."</h5><div class='card-body'>";
                        $form_row .= self::createFormData($fld);
                    } else if ($i == (sizeof($field['item_form']) - 1)) {
                        $form_row .= self::createFormData($fld);
                        $form_row .= '</div></div></div>';
                    } else {
                        $form_row .= self::createFormData($fld);
                    }
                    $i++;
                }
            } else {
                $form .= self::createFormData($field);
            }
        }

        if (!empty($form_row)) {
            $form .= '<div class="row">'. $form_row .'</div>';
        }
        $form .= '<div class="d-flex justify-content-between">';
        // Tambahkan tombol submit
        $submit = form_submit([
            'name' => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-primary',
        ]);
        $backButton = form_button(['name' => 'btnCancel', 'onclick'=>'hideModal()', 'id'=>'btnCancel', 'class'=>'btn btn-warning', 'type' => 'button', 'content' => 'Cancel']);
        $form .= $backButton;
        $form .= $submit;
        $form .= "</div>";
        // Tambahkan form closing tag
        $form .= form_close();

        return $form;
    }

    protected static function createFormData($field) {
        $validation = \Config\Services::validation();
        $form = '';
            if (isset($field['type'])) {
                // Tipe elemen formulir yang diizinkan
                
                if (!in_array($field['type'], self::$allowedTypes)) {
                    // Tipe tidak valid, lewati
                    return '';
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
            case 'decimal':
                    return form_input([
                            'name'          => $field['name'],
                            'value'         => isset($field['value']) ?? '', // Optional: set default value
                            'type'          => 'number',
                            'step'          => '0.01', // Set the step attribute for decimal places
                            'class'         => 'form-control', // Optional: add CSS class for styling
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
