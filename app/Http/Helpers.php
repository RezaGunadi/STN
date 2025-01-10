<?php

use App\Lang\EnLang;
use App\Lang\IdLang;
use Ayo\Chat\Chat;
use Ayo\Mobile\User;
use Ayo\Mobile\UserMeta;
use Illuminate\Support\Facades\Log;
use Ayo\Chat\ChatRepository;
use GuzzleHttp\Client;


function stringToSlug($string)
{
    return strtolower(str_replace(' ', '_', $string));
}

function slugToString($string)
{
    return ucwords(str_replace('_', ' ', $string));
}

function moneyFormat($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}
function moneyFormatWithoutSpace($angka)
{
    return "Rp" . number_format($angka, 0, ',', '.');
}

function randomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function capitalNumbericRandomString($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateNewCode($key1, $key2, $key3)
{
    $result = '';
    $key1Array = explode(' ', $key1);
    $key2Array = explode(' ', $key2);
    $key3Array = explode(' ', $key3);

    for ($i = 0; $i < count($key1Array); $i++) {
        if (count($key1Array) > 0) {
            $result = $result . $key1Array[$i];
        }
    }
    for ($i = 0; $i < count($key2Array); $i++) {
        if (count($key2Array) > 0) {
            $result = $result . $key2Array[$i];
        }
    }
    for ($i = 0; $i < count($key3Array); $i++) {
        if (count($key3Array) > 0) {
            $result = $result . $key3Array[$i];
        }
    }
    return $result;
}
function generateCode($currectDigit, $key)
{
    $result = $key;
    $longString = strlen((string)$currectDigit);

   
    for ($i = 0; $i < (6 - $longString); $i++) {
        $result = $result . '0';
    }
    $result = $result . $currectDigit;
    return $result;
}
