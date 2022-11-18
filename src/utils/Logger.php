<?php

namespace utils;

class Logger
{
    public static function logAction($value)
    {
        try {
            $path = '/var/log/classroom/' . date('d/m/Y') . '.log';
            $file = fopen($path, 'r+');
            fwrite($file, $value);
            fclose($file);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function logError($value)
    {
        try {

            $path = '/var/log/classroom/' . date('d/m/Y') . 'Error.log';
            $file = fopen($path, 'r+');
            fwrite($file, $value);
            fclose($file);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
