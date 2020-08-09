<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class LocalFileUploadService
{
    private $file, $file_name;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function save($path)
    {
        $this->file->storeAs($path,$this->generateFileName());
        return $this;
    }

    protected function generateFileName()
    {
        return $this->file_name = $this->file->hashName();
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}