<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use ZipArchive;

class Utility extends Model
{

    public static function saveImage($file, $dir, $fieldName)
    {
        $fileName           = $fieldName . "_" . time() . '_' . rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
        $destinationPath    = public_path() . '/uploads/' . $dir;
        $file->move($destinationPath, $fileName);
        // dd($fileName);
        return "$fileName";
    }

    public static function unlinkFile($file, $dir)
    {
        if ($file != '') {
            $file_ph = public_path() . "/uploads/$dir/" . $file;
            if (file_exists($file_ph)) {
                unlink($file_ph);
            }
        }
    }

    public static function filePathShow($file, $dir, $type = 'img')
    {
        if ($type == 'img') {
            $noImg = asset('admin/dist/img/noImg.jpg');
            $file_ph = (($file != '') && file_exists(public_path() . "/uploads/$dir/$file")) ? asset("uploads/$dir/$file") : $noImg;
        } elseif ($type == 'file') {
            $file_ph = (($file != '') && file_exists(public_path() . "/uploads/$dir/$file")) ? asset("uploads/$dir/$file") : '';
        }
        return $file_ph;
    }

    public static function arrayToCSV($la_output, $fileName)
    {
        // open raw memory as file so no temp files needed, you might run out of memory though
        $f = fopen('php://memory', 'w');
        // loop over the input array
        foreach ($la_output as $line) {
            // generate csv lines from the inner arrays
            fputcsv($f, $line);
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="' . $fileName . '.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($f);
        exit();
    }

    public static function showDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }
 
}
