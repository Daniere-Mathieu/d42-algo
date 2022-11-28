<?php

namespace utils;

class Logger
{
    public static function logAction($value)
    {
        try {
            $path = '/var/log/classroom/' . date('d-m-Y') . '.log';
            $file = fopen($path, 'c+');
            fwrite($file, $value . 'at ' . date('H/i/s/d/m/Y'));
            fclose($file);
        } catch (\Throwable $th) {
            Logger::logError('Fail to log action : ' . $value);
            throw $th;
        }
    }

    public static function logError($value)
    {
        try {
            $path = '/var/log/classroom/' . date('d-m-Y') . '.Error.log';

            $file = fopen($path, 'c+');
            fwrite($file, $value . 'at ' . date('s/i/H/d/mY'));
            fclose($file);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
