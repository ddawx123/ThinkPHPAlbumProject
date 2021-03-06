<?php
function getGravatar($email, $s = 128, $d = 'mm', $r = 'g', $img = false, $atts = array())
{
    $url = 'https://cn.gravatar.com/avatar/';
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
