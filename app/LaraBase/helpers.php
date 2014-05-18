<?php

// Function to set Active States in Navigation Links >views>layouts>navigation.blade.php
function active($path, $active='active')
{
    return Request::is($path) ? $active : null;
}