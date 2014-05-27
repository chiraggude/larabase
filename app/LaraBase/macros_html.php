<?php

// Line Break </br>
HTML::macro('br', function($count = 1)
{
    $br = str_repeat("</br>", $count);
    return $br;
});