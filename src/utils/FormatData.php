<?php

namespace utils;

class FormatData
{
    /**
     * this algo return a two dimensionnal array
     * @param array $array array who need to be filter
     * @param int $grid number of item per line needeed (optionnal)
     */
    public static function formatForDisplayGrid(array $array, int $grid = 3): array
    {
        // final array
        $sortArray = [];
        // counter of line per array
        $counter = 0;
        // index of the final index
        $sortArrayIndex = 0;
        // i make a loop to filter my array
        for ($i = 0; $i < count($array); $i++) {
            // i use a if to verif if my counter is superior or equals to my grid limit
            if ($counter >= $grid) {
                // if counter is superior or equals , i set 0 to the counter variable and increase the index of my final array 
                $counter = 0;
                $sortArrayIndex++;
            }
            // i push the value in my final array of i
            $sortArray[$sortArrayIndex][$counter] = $array[$i];
            // i increase my counter
            $counter++;
        }
        // after my loop i return the array
        return $sortArray;
    }

    /**
     * this static method return a cut string
     * @param string $value the string i want to format
     * @param int $limit the limit size of the string i want 
     * @return string the string formated
     */
    public static function formatCourseName(string $value, int $limit = 20): string
    {
        $size = strlen($value);
        if ($size <= $limit) return $value;
        return substr($value, $limit);
    }
}
