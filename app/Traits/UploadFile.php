<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;

trait UploadFile
{
    /**
     * @param UploadedFile $file
     * @param string $name
     *
     * @return string
     */
    public function upload(UploadedFile $file, string $name): string {
        try {
            $fileName = $this->setName($file, $name);
            $file->storeAs(config('constraint.path.image.avatar'), $fileName);
        } catch (Exception $e) {
            throw new Exception('Caught exception: ', $e->getMessage());
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
