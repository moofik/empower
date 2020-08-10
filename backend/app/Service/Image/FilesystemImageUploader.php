<?php


namespace App\Service\Image;


use Carbon\Carbon;
use Intervention\Image\ImageManager;

class FilesystemImageUploader implements ImageUploader
{
    /**
     * @var ImageManager
     */
    private $imageManager;

    /**
     * FilesystemImageUploader constructor.
     * @param  ImageManager  $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @param  string[]  $imagesData
     * @return array
     */
    public function bulkUpload(array $imagesData): array
    {
        $links = [];

        foreach ($imagesData as $imageData) {
            if (!is_string($imageData)) {
                throw new InvalidImageDataException('Image data should be base64 string.');
            }

            $links[] = $this->upload($imageData);
        }

        return $links;
    }

    /**
     * @param  string  $imageData
     * @return string
     */
    public function upload(string $imageData): string
    {
        $mimeType = explode(':', substr($imageData, 0, strpos($imageData, ';')))[1];
        $dataType =  explode('/', $mimeType)[1];
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $dataType;

        $relativePathToImage = 'images/' . $fileName;
        $absolutePathToImage = public_path('images/') . $fileName;
        $this->imageManager->make($imageData)->save($absolutePathToImage);

        return $relativePathToImage;
    }
}
