<?php

namespace App\Http\Controllers;

use Request;
use Storage;

class FileController extends Controller
{

    public static function human_filesize($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    public static function est_download($filesize) {
        // Number of seconds per connection speed to DL (in mbps)
        $m5 = round($filesize / 5000000 / 60);
        $m10 = round($filesize / 10000000 / 60);
        $m20 = round($filesize / 20000000 / 60);
        //$m50 = round($filesize / 50000000 / 60);

        // Checks for special cases
        $m5b = ($m5 == 0 ? "<1" : $m5);
        $m10b = ($m10 == 0 ? "<1" : $m10);
        $m20b = ($m20 == 0 ? "<1" : $m20);
        //$m50b = ($m50 = 0 ? "<1" : $m50);

        return sprintf("5mbps: %s | 10mbps: %s | 20mbps: %s",
            strval($m5b),
            strval($m10b),
            strval($m20b));
    }

    public static function get_folders($filereq){
        $folders = array_filter(Storage::directories($filereq), function ($e) {
            return $e % ($e != "seeding");
        });
    }

    public function commandgen()
    {
        $wgetstr = 'wget -m -c -nH -k -w2 -erobots=off %s/%s';
        return sprintf($wgetstr, env('ASSET_URL'), Request::path());
    }


    public function index($filereq = "/")
    {
        $apiresp = json_decode(file_get_contents(env('API_URL') . rawurlencode($filereq)));
        $dirs = $apiresp->dirs;
        $files = $apiresp->files;

        if (count(get_object_vars($dirs)) == 0 && count(get_object_vars($files)) == 0){
            return "There's nothing here";
        }

        $updir = "/";
        $spl = explode('/', $filereq);
        if (count($spl) > 1) { // If you're not in root
            $spl = array_slice($spl, 0, (count($spl) - 1));
            $updir = implode('/', $spl);
        }
        $totalsize = 0;
        foreach ($files as $file) {
            $totalsize += $file->size;
        }

        # Check for downloaders
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Wget') !== false) {
            return view('pages.downloaders', [
                "spath"=>env('SECRET_FILEHOST_PATH'),
                "parent"=>$apiresp->root,
                "files"=>$files,
                "dirs"=>$dirs,
            ]);
        }

        return view('pages.show-files', [
            "wgetgen"=>$this->commandgen(),
            "parent"=>$apiresp->root,
            "filereq"=>$filereq,
            "totalsize"=>$totalsize,
            "files"=>$files,
            "dirs"=>$dirs,
            "updir"=>$updir,
            "spath"=>env('SECRET_FILEHOST_PATH'),
            "dateformat"=>"m/d/Y",
        ]);
    }
}
