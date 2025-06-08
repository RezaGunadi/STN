<?php

namespace App\Helpers;

class ToastHelper
{
    public static function success($message, $title = 'Success!')
    {
        session()->flash('toast', [
            'type' => 'success',
            'title' => $title,
            'message' => $message,
            'icon' => 'success',
            'timer' => 3000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'background' => '#28a745',
            'color' => '#ffffff'
        ]);
    }

    public static function error($message, $title = 'Error!')
    {
        session()->flash('toast', [
            'type' => 'error',
            'title' => $title,
            'message' => $message,
            'icon' => 'error',
            'timer' => 3000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'background' => '#dc3545',
            'color' => '#ffffff'
        ]);
    }

    public static function warning($message, $title = 'Warning!')
    {
        session()->flash('toast', [
            'type' => 'warning',
            'title' => $title,
            'message' => $message,
            'icon' => 'warning',
            'timer' => 3000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'background' => '#ffc107',
            'color' => '#000000'
        ]);
    }

    public static function info($message, $title = 'Info!')
    {
        session()->flash('toast', [
            'type' => 'info',
            'title' => $title,
            'message' => $message,
            'icon' => 'info',
            'timer' => 3000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'background' => '#17a2b8',
            'color' => '#ffffff'
        ]);
    }
}
