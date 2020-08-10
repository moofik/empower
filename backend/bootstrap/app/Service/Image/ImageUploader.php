<?php


namespace App\Service\Image;


interface ImageUploader
{
    /**
     * @param  string[]  $imagesData
     * @return array
     */
    public function bulkUpload(array $imagesData): array;

    /**
     * @param  string  $imageData
     * @return string
     */
    public function upload(string $imageData): string;
}
