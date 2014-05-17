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


