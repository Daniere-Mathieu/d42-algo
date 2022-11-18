<?php

namespace utils;

class Verification
{
    public static function verifyIfExistAndIsNotEmpty($value): bool
    {
        return  is_null($value) || !isset($value) || empty($value);
    }
    public static function arrayKeysExist(array $keys, array $array): bool
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $array)) return false;
        }
        return true;
    }
}
