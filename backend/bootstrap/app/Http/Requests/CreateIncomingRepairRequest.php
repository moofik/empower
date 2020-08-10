<?php

namespace App\Http\Requests;


use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\User;

class CreateIncomingRepairRequest extends CreateRepairRequest
{
    /**
     * @var string
     */
    public $workshopId;

    protected function passedValidation()
    {
        parent::passedValidation();

        /** @var User $user */
        $user = User::find($this->workshopId);

        if (!$user->hasRole([User::USER_ROLE_SHOP])) {
            $problem = new Problem(404);
            $problem->setDetail(sprintf('Shop with identifier %s not found.', $this->workshopId));
            throw new ProblemException($problem);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $parentRules = parent::rules();

        return array_merge($parentRules, [
            'workshop_id' => 'required|numeric'
        ]);
    }
}
