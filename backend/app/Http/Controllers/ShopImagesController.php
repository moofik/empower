<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImage;
use App\Http\Requests\UploadImageArray;
use App\Image;
use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\Service\Image\ImageUploader;
use App\User;
use App\ShopCertificate;
use App\ShopLogo;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShopImagesController extends Controller
{
    /**
     * @param Guard $guard
     * @return RestrictableResource
     */
    public function logo(Guard $guard): RestrictableResource
    {
        /** @var User $user */
        $user = $guard->user();

        if (!$user->workshopLogo) {
            throw new NotFoundHttpException();
        }

        $image = $user->workshopLogo->image;

        return new RestrictableResource($image);
    }

    /**
     * @param UploadImage $request
     * @param Guard $guard
     * @param ImageUploader $imageUploader
     * @return RestrictableResource
     */
    public function logoUpload(UploadImage $request, Guard $guard, ImageUploader $imageUploader): RestrictableResource
    {
        /** @var User $workshop */
        $workshop = $guard->user();
        $imageString = $request->get('image');
        $logoRelativePath = $imageUploader->upload($imageString);

        if (!$workshop->shopLogo()->exists()) {
            $workshopLogo = new ShopLogo();
            $workshop->shopLogo()->save($workshopLogo);

            $image = new Image(['url' => $logoRelativePath]);
            $image->imageable()->associate($workshopLogo);
            $image->save();
        } else {
            $workshopLogo = $workshop->workshopLogo;

            try {
                $workshopLogo->image->delete();
            } catch (Exception $exception) {
            }

            $image = new Image(['url' => $logoRelativePath]);
            $image->imageable()->associate($workshopLogo);
            $image->save();
        }

        return new RestrictableResource($image);
    }

    /**
     * @param Guard $guard
     * @return ExtendableResourceCollection
     */
    public function certificates(Guard $guard): ExtendableResourceCollection
    {
        /** @var User $workshop */
        $workshop = $guard->user();

        if (!$workshop->shopCertificates()->exists()) {
            $problem = new Problem(404);
            throw new ProblemException($problem);
        }

        $certificates = $workshop
            ->shopCertificates()
            ->with('image')
            ->get();

        $images = $certificates
            ->pluck('image')
            ->filter();

        return ExtendableResourceCollection::extendableCollection($images);
    }

    /**
     * @param UploadImageArray $request
     * @param Guard $guard
     * @param ImageUploader $imageUploader
     * @return ExtendableResourceCollection
     */
    public function certificatesUpload(UploadImageArray $request, Guard $guard, ImageUploader $imageUploader): ExtendableResourceCollection
    {
        /** @var User $workshop */
        $workshop = $guard->user();
        $imagesStrings = $request->get('images');
        $certificatesPathes = $imageUploader->bulkUpload($imagesStrings);
        $bulkInstancesData = [];

        foreach ($certificatesPathes as $logoRelativePath) {
            $bulkInstancesData[] = ['url' => $logoRelativePath];
        }

        $workshopLogo = new ShopCertificate();
        $workshop->shopCertificates()->save($workshopLogo);

        foreach ($bulkInstancesData as $imageData) {
            $image = new Image($imageData);
            $image->imageable()->associate($workshopLogo);
            $image->save();
        }

        $certificates = $workshop
            ->shopCertificates()
            ->with('image')
            ->get();

        $images = $certificates
            ->pluck('image')
            ->filter();

        return ExtendableResourceCollection::extendableCollection($images);
    }
}
