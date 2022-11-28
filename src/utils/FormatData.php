<?php

namespace utils;

class FormatData
{
    public static function formatForDisplayGrid(array $array, int $grid = 3): array
    {
        $sortArray = [];
        $counter = 0;
        $sortArrayIndex = 0;
        for ($i = 0; $i < count($array); $i++) {
            if ($counter >= $grid) {
                $counter = 0;
                $sortArrayIndex++;
            }
            $sortArray[$sortArrayIndex][$counter] = $array[$i];
            $counter++;
        }
        return $sortArray;
    }
}
