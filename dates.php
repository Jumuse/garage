<?php

function dateToFrench($date, $format)
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
};
$weekHours = "8h45 à 12h & 14h à 18h";
$saturdayHours = "8h45 à 12h";
$sundayHours = "le garage est fermé";

function retrieveDate() {
    $date = date('l');
    $dayOfWeek = date('w', strtotime($date));
    global $weekHours, $saturdayHours, $sundayHours;

    if ($dayOfWeek == 1 || $dayOfWeek == 2 || $dayOfWeek == 3 || $dayOfWeek == 4 || $dayOfWeek == 5)
    {
        echo "le garage est ouvert de ". $weekHours;
    } else if ($dayOfWeek == 6)
    {
        echo "le garage est ouvert de ". $saturdayHours;
    } else if ($dayOfWeek == 0)
    {
        echo $sundayHours;
    }
};
