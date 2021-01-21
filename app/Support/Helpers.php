<?php
if (!function_exists('generateIP')) {
    function generateIP(): string
    {
        return rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' .
            rand(0, 255) . ':' . rand(1, 65535);
    }
}
