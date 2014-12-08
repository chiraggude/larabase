<?php

// Line Break </br>
HTML::macro('br', function($count = 1)
{
    $br = str_repeat("</br>", $count);
    return $br;
});

// Table
HTML::macro('table', function($current_settings = array(), $fields = array())
{
    $table = '<div class="table-responsive"><table class="table table-bordered table-hover table-striped">';
    $table .='<tr>';
        foreach ($fields as $field)
        {
            $table .= '<th>' . Str::title($field) . '</th>';
        }
    $table .= '</tr>';
    $table .= '<tr>';
        if ( $current_settings == null){
            foreach($fields as $value) {
                $table .= '<td>Value</td>';
            }
        } else {
            foreach($current_settings as $value) {
                $table .= '<td>' .$value. '</td>';
            }
        }
    $table .= '</tr>';
    $table .= '</table></div>';
    return $table;
});

// Delete Modal
HTML::macro('deleteModal', function($modalID, $resource, $resource_name, $resource_id)
{
    $form_open = Form::open(['route' => [''.$resource.'.destroy', $resource_id], 'method' => 'DELETE']);
    $form_submit = Form::submitField("Delete", "btn btn-danger");
    $form_close =  Form::close();
    return '<div class="modal fade" id="'.$modalID.'" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="deleteModal">Delete '.$resource_name.'</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure you want to permanently delete this '.$resource_name.'?</h4>
                        <br>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                        '.$form_open.'
                        '.$form_submit.'
                        '.$form_close.'
                    </div>
                </div>
            </div>
        </div>';
});


// Delete Modal
HTML::macro('deleteAccountModal', function($modalID)
{
    $form_open = Form::open(['action' => 'AccountController@deleteAccount']);
    $form_submit = Form::submitField("Delete Account", "btn btn-danger pull-left");
    $form_close =  Form::close();
    return '<div class="modal fade" id="'.$modalID.'" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="deleteModal">Permanently Delete Account</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure you want to delete your account and all associated data?</h4>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                        '.$form_open.'
                        '.$form_submit.'
                        '.$form_close.'
                        <br><br>
                    </div>
                </div>
            </div>
        </div>';
});
