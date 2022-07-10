<?php

use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('showMessage')) {
    /**
     * @param $label [success, error, info, warning, question]
     * @param $type [toast, alert, success, info, warning, error, question, image, html]
     */
    function showMessage(string $message, string $label = 'success', string $type = 'toast')
    {
        Alert::$type($message, $label);
    }
}
