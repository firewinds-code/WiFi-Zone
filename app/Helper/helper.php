<?php

use Illuminate\Support\Facades\DB;

function generateLocationOptions()
{
    $source_of_calling = [
        'Delhi' => 'Delhi',
        'Noida' => 'Noida',

    ];
    $options = '';
    foreach ($source_of_calling as $value => $label) {
        $options .= "<option value='$value'>$label</option>";
    }
    return $options;
}