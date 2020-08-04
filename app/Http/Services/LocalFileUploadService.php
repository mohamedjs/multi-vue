<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class LocalFileUploadService
{    
    /**
     * file, filename
     *
     * @var UploadedFile $file
     * @var Sting $file_name
     */
    private $file, $file_name;
    
    /**
     * __construct
     *
     * @param  UploadedFile $file
     * @return void
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }
    
    /**
     * save
     *
     * @param  String $path
     * @return LocalfileUploadService
     */
    public function save($path)
    {
        $this->file->storeAs($path, $this->generateFileName());
        return $this;
    }
    
    /**
     * generateFileName
     *
     * get File name From hash name that's in File helper
     * 
     * @return void
     */
    public function generateFileName()
    {
        $this->file_name = $this->file->hashName();
    }
    
    /**
     * getFileName
     *
     * @return String $File_name
     */
    public function getFileName()
    {
        return $this->file_name;
    }
}