<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;



if (!function_exists('isActiveDashboard')) {
    function isActiveDashboard()
    {
        return Request::is('home');
    }
}

if (!function_exists('isActiveManajData')) {
    function isActiveManajData()
    {
        return Request::is('dataDosen*') || Request::is('dataMahasiswa*') || Request::is('tempatMagang*');
    }
}

if (!function_exists('isActiveManajMagang')) {
    function isActiveManajMagang()
    {
        return Request::is('rekomendasiIndustri*') || Request::is('hasilRekomendasi*');
    }
}

if (!function_exists('isActivePenjadwalan')) {
    function isActivePenjadwalan()
    {
        return Request::is('penjadwalan*') || Request::is('laporanPenjadwalan*') || Request::is('kelompokDosen*');
    }
}


if (!function_exists('isActiveKonfirmasi')) {
    function isActiveKonfirmasi()
    {
        return Request::is('konfirmasiDosen*') || Request::is('konfirmasiIndustri*');
    }
}


if (!function_exists('isActiveCalendar')) {
    function isActiveCalendar()
    {
        return Request::is('kalender');
    }
}

if (!function_exists('isActiveCollapse')) {
    function isActiveCollapse()
    {
        return Request::is('collapse');
    }
}