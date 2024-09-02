<?php

namespace App\Utilities;

class FileUtility
{
    public static function jsonFileToArray($file_path = null) {
        if (is_null($file_path)) {
            return false;
        }

        // 1. Open the file
        $json_string = file_get_contents($file_path);

        // 2. Convert it the array
        $data = json_decode($json_string, true);

        // 3. Return data as an Array
        return $data;
    }
}