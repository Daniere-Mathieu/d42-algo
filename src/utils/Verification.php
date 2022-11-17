<?php

namespace utils;

class Verification
{
    public static function verifyIfExistAndIsNotEmpty($value)
    {
        return  is_null($value) || !isset($value) || empty($value);
    }
}
