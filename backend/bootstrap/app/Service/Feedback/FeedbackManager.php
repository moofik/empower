<?php


namespace App\Service\Feedback;


use App\Image;
use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\Service\Image\ImageUploader;
use App\User;
use App\ShopFeedback;
use Exception;
use Illuminate\Database\DatabaseManager;

class FeedbackManager
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;
    /**
     * @var ImageUploader
     */
    private $imageUploader;

    /**
     * FeedbackManager constructor.
     * @param DatabaseManager $databaseManager
     * @param ImageUploader $imageUploader
     */
    public function __construct(DatabaseManager $databaseManager, ImageUploader $imageUploader)
    {
        $this->databaseManager = $databaseManager;
        $this->imageUploader = $imageUploader;
    }

    /**
     * @param int $userId
     * @param int $workshopId
     * @param string $author
     * @param string $text
     * @param string|null $imageData
     * @return ShopFeedback
     * @throws Exception
     */
    public function createFeedback(int $userId, int $workshopId, string $text, ?string $imageData): ShopFeedback
    {
        $this->databaseManager->beginTransaction();

        try {
            $feedback = new ShopFeedback();
            $feedback->text = $text;
            $feedback->customer()->associate(User::findOrFail($userId));
            $feedback->shop()->associate(User::findOrFail($workshopId));
            $feedback->save();
        } catch(Exception $e) {
            $this->databaseManager->rollback();
            $problem = new Problem(500);
            $problem->setDetail($e->getMessage());
            throw new ProblemException($problem);
        }

        $this->databaseManager->commit();

        if ($imageData) {
            $imgRelativePath = $this->imageUploader->upload($imageData);
            $image = new Image(['url' => $imgRelativePath]);
            $image->imageable()->associate($feedback);
            $image->save();
        }

        return $feedback;
    }
}
