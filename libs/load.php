<?php

include "includes/User.class.php";
include "includes/Database.class.php";
include "includes/Session.class.php";
// global $__site_config;
// $__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../appconfig1.json');



// function get_config($key, $default=null)
// {
//     global $__site_config;
//     $array = json_decode($__site_config, true);
//     if (isset($array[$key])) {
//         return $array[$key];
//     } else {
//         return $default;
//     }
// }

Session::start();
// loading a header file
function load_template($name)
{
    include_once $_SERVER['DOCUMENT_ROOT']."/vanaminn/vanam_dashboard_final_5/vanam_dashboard_final_5/dashboard/_template/$name.php";
}

function redirect($url) {
    header('Location: '.$url);
    die();
}