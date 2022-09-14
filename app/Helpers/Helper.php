<?php
/** Halper
 *  Author : Andi Wijang prasetyo
 *  Email : Andy.wijang@gmail.com
 * 
 */



function activeRoute($route, $isClass = false): string
{
    $requestUrl = request()->is($route);
    
    if($isClass) {
        return $requestUrl ? $isClass : '';
    } else {
        return $requestUrl ? 'active' : '';
    }
}

/**
 * route('dashboard.1') for url condition
 * 'dashboard.1' for getName condition
 */
function activeRouteName($route, $isClass = false): string
{ 
    // $requestUrl = request()->url() === $route
    $requestUrl = request()->routeIs($route);

    if ($isClass) {
        return $requestUrl ? $isClass : '';
    } else {
        return $requestUrl ? 'active' : '';
    }
}


/**
 * get image profile from email
 * 
 */

function get_gravatar($email, $s = 200, $d = 'mp', $r = 'g', $img = false, $atts = []) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";

    if ($img) {
        $url = '<img src="' . $url . '"';

        foreach ($atts as $key => $val) {
            $url .= ' ' . $key . '="' . $val . '"';
        }

        $url .= ' />';
    }

    return $url;
}


