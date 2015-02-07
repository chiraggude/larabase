<?php

Form::macro('textField', function($name, $label, $placeholder = '', $value = null)
{
    if($value == null) {
        // Get old form input type field (Does not work on textarea, select)
        $value = Form::getValueAttribute($name);
    }
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>"
            .Form::text($name, $value, ['class'=> 'form-control', 'placeholder'=>$placeholder])
            .errorMessage($name).
            "</div>";
});


Form::macro('passwordField', function($name, $label, $placeholder)
{
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input type='password' name='{$name}' class='form-control' id='{$name}' placeholder='{$placeholder}'>"
            .errorMessage($name).
            "</div>";
});


Form::macro('emailField', function($name, $label, $placeholder = '')
{
    $value = Form::getValueAttribute($name); // Get old form input type field (Does not work on textarea, select)
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input type='email' name='{$name}' class='form-control' id='{$name}' value='{$value}' placeholder='{$placeholder}'>"
            .errorMessage($name).
            "</div>";
});


Form::macro('textareaField', function($name, $label, $placeholder)
{
    $value = Form::getValueAttribute($name);
    $element = Form::textarea($name, $value, ['placeholder'=> $placeholder, 'class'=>'form-control', 'id'=>$name]);
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            {$element}"
            .errorMessage($name).
            "</div>";
});


Form::macro('selectField', function($name, $options, $value, $label)
{
    $element = Form::select($name, $options, $value, ['class'=>'form-control']);
    return "<div class='form-group " .errorClass($name)."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            {$element}"
            .errorMessage($name).
            "</div>";
});

Form::macro('multiSelectField', function($name, $options, $value = null, $label)
{
    $element = Form::select($name, $options, $value, ['class' => 'form-control multiselect','multiple']);
    return "<div class='form-group " .errorClass($name)."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            {$element}"
    .errorMessage($name).
    "</div>";
});


Form::macro('selectTag', function($name, $id, $label)
{
    return "<div class='form-group " .errorClass($name)."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input id='{$id}' class='form-control' name='{$name}'/>"
            .errorMessage($name).
            "</div>";
});


Form::macro('fileField', function($name, $label)
{
    return "<div class='form-group " .errorClass($name)."'>
            <label class='control-label' for='{$name}'>{$label}</label>"
            .Form::file($name)
            .errorMessage($name).
            "</div>";
});


Form::macro('submitField', function($value = 'Submit', $btn_style = 'btn btn-primary')
{
    return "<div class='form-group'>
            <button type='submit' class='{$btn_style}'>{$value}</button>
            </div>";
});


if (! function_exists ( 'errorMessage' )) {
    function errorMessage($name) {
        if ($errors = Session::get('errors' )) {
            return $errors->first($name, '<p class="help-block">:message</p>');
        }
        return "<p class='help-block' id='{$name}'></p>";
    }
}


if (! function_exists ( 'errorClass' )) {
    function errorClass($name) {
        $error = null;
        if ($errors = Session::get ( 'errors' )) {
            $error = $errors->first ( $name ) ? 'has-error' : null;
        }
        return $error;
    }
}