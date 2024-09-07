<?php

if (!function_exists('ip')) {
    function ip() : string
    {
        return request()->server('HTTP_CF_CONNECTING_IP') ?? request()->ip();
    }
}
