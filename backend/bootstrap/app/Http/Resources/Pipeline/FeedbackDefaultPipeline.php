<?php


namespace App\Http\Resources\Pipeline;


use App\Http\Resources\Transformer\Feedback\AddAuthorToFeedback;
use App\Http\Resources\Transformer\Feedback\AddLatestRatingToFeedback;
use App\Http\Resources\Transformer\Feedback\FormatFeedbackText;
use Moofik\LaravelResourceExtenstion\Pipeline\ExtensionPipeline;

class FeedbackDefaultPipeline extends ExtensionPipeline
{
    public function __construct()
    {
        $this
            ->addTransformer(new AddLatestRatingToFeedback())
            ->addTransformer(new FormatFeedbackText())
            ->addTransformer(new AddAuthorToFeedback());
    }
}
