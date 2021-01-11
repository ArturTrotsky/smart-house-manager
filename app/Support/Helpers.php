<?php
if (!function_exists('generateIP')) {
    function generateIP(): string
    {
        return rand(1, 999) . '.' . rand(1, 999) . '.' . rand(1, 999) . '.' .
            rand(1, 999) . ':' . rand(1, 65535);
    }
}
