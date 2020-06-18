<?php

if(!function_exists('active_menu'))
{
    function active_menu($link)
    {

        if(preg_match('/'.$link.'/i', Request::segment(1)))
        {
            return ['menu-open', 'display:block', 'active'];
        }else{
            return ['', '', ''];

        }
    }
}
