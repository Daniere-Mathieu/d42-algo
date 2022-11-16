<?php
class Verification
{
    public function verifyIfExistAndIsNotEmpty($value)
    {
        return  !isset($value) || empty($value);
    }
}
