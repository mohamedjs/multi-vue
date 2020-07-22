<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 6/1/19
 * Time: 10:46 PM
 */

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use File;

class UploaderService
{
    public function upload(UploadedFile $file, $folder)
    {
        $date_path = date("Y") . '/' . date("m") . '/' . date("d") . '/';
        $path = public_path() . '/uploads/'.$folder.'/' . $date_path;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file_name = date('YmdHis').mt_rand().'_'.$folder.'.'.$file->getClientOriginalExtension();

        if ($file->move($path, $file_name)) {
            return 'uploads/'.$folder.'/'.$date_path.$file_name;
        }
    }
}
