<?php

define("FILE_NAME", "counter.dat");

function readFromFile()
{
    $handle = fopen(FILE_NAME, "r");
    $contents = fread($handle, filesize(FILE_NAME));
    fclose($handle);
    return $contents;
}

function writeToFile($value)
{
    if (is_writable(FILE_NAME))
    {
        if (!$handle = fopen(FILE_NAME, "w+"))
        {
            exit;
        }
            if (!fwrite($handle, $value))
        {
            exit;
        }

        fclose($handle);
    }
}

?>