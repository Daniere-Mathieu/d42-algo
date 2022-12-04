<?php

namespace utils;


class Redirect
{
    /**
     * this static method redirect and die the current script
     * @param string $value the page i want to redirect to
     */
    public static function redirectAndDie(string $value): void
    {
        header('Location: ' . $value);
        die();
    }
}
