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
        return Request::is('dataDosen*') || Request::is('dataDosen2*') ||Request::is('dataMahasiswa*') || Request::is('dtMahasiswa*');
    }
}

if (!function_exists('isActiveManajMagang')) {
    function isActiveManajMagang()
    {
        return Request::is('rekomendasiIndustri*') || Request::is('hasilRekomendasi*');
    }
}

if (!function_exists('isActiveKonfirmasiIndustri')) {
    function isActiveKonfirmasiIndustri()
    {
        return Request::is('konfirmasiIndustri');
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
        return Request::is('konfirmasiDosen') ;
    }
}

if (!function_exists('isActiveperubahanIndustri')) {
    function isActiveperubahanIndustri()
    {
        return Request::is('perubahanIndustri');
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
