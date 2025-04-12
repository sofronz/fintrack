<?php

if (! function_exists('format_amount')) {
    /**
     * @param mixed $value
     *
     * @return [type]
     */
    function format_amount($value)
    {
        return fmod($value, 1) == 0
            ? number_format($value, 0, ',', '.')
            : number_format($value, 2, ',', '.');
    }
}
