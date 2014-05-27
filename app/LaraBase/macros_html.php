<?php

// Line Break </br>
HTML::macro('br', function($count = 1)
{
    $br = str_repeat("</br>", $count);
    return $br;
});


HTML::macro('table', function($data = array(), $fields = array())
{
    $table = '<div class="table-responsive"><table class="table table-bordered table-hover table-striped">';

    $table .='<tr>';
        foreach ($fields as $field)
        {
            $table .= '<th>' . Str::title($field) . '</th>';
        }
    $table .= '</tr>';

    $table .= '<tr>';
        if ( $data == null){
            foreach($fields as $key) {
                $table .= '<td>Value</td>';
            }
        } else {
            foreach($fields as $key) {
                $table .= '<td>' . $data->$key . '</td>';
            }
        }
    $table .= '</tr>';

    $table .= '</table></div>';

    return $table;
});