<?php

Form::macro('textField', function($name, $label, $placeholder)
{
    $value = Form::getValueAttribute($name); // Get old form input type field (Does not work on textarea, select)
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input type='text' name='{$name}' class='form-control' id='{$name}' value='{$value}' placeholder='{$placeholder}'>"
            . errorMessage($name).
            "</div>";
});

Form::macro('passwordField', function($name, $label, $placeholder)
{
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input type='password' name='{$name}' class='form-control' id='{$name}' placeholder='{$placeholder}'>"
            . errorMessage($name).
            "</div>";
});


Form::macro('emailField', function($name, $label, $placeholder)
{
    $value = Form::getValueAttribute($name); // Get old form input type field (Does not work on textarea, select)
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$name}'>{$label}</label>
            <input type='email' name='{$name}' class='form-control' id='{$name}' value='{$value}' placeholder='{$placeholder}'>"
            . errorMessage($name).
            "</div>";
});


Form::macro('textareaField', function($name, $label, $placeholder)
{
    $value = Form::getValueAttribute($name);
    $element = Form::textarea($name, $value, array('placeholder'=>$placeholder, 'class'=>'form-control'));
    return "<div class='form-group " . errorClass($name) ."'>
            <label class='control-label' for='{$label}'>{$label}</label>
            {$element}"
            . errorMessage($name).
            "</div>";
});


Form::macro('submitField', function($value, $btn_style = 'btn btn-primary')
{
    return "<div class='form-group'>
            <input class='{$btn_style}' type='submit' value='{$value}'>
            </div>";
});


if (! function_exists ( 'errorMessage' )) {
    function errorMessage($name) {
        if ($errors = Session::get ( 'errors' )) {
            return $errors->first($name, '<p class="help-block">:message</p>');
        }
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