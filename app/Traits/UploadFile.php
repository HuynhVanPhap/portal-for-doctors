<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

trait UploadFile
{
    /**
     * @param UploadedFile $file
     * @param string $name
     *
     * @return string|null
     */
    public function upload(UploadedFile $file, string $name): string|null {
        try {
            $fileName = $this->setName($file, $name);
            $file->storeAs(config('constraint.path.image.avatar'), $fileName);
        } catch (Exception $e) {
            // throw new Exception('Upload file fail : '.$e->getMessage().' name '.$fileName);
            Log::error('Upload file fail : '.$e->getMessage().' name '.$fileName);
            return null;
        }

        return $fileName;
    }

    /**
     * Set name for File
     *
     * @param UploadedFile $file
     * @param string $name
     *
     * @return string
     */
    public function setName(UploadedFile $file, string $name): string {
        return $name.$file->getClientOriginalName();
    }
}
