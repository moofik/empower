<?php


namespace App\Http\Requests\Traits;


use App\Service\Api\Problem;
use App\Service\Api\ProblemException;

trait ManyToManyRules
{
    /**
     * @param  array  $customRules
     * @return array
     */
    public function getManyToManyUpdateRules(array $customRules = []): array
    {
        $count = count($this->all());

        if ($count === 0) {
            $problem = new Problem(400, Problem::TYPE_VALIDATION_ERROR);
            $problem->setDetail('Request fields is absent');
            throw new ProblemException($problem);
        }

        $result = [];

        for ($i = 0; $i < $count; $i++) {
            $result[$i] = 'required|array';
            $result[$i.'.id'] = 'required|integer';
            $result[$i.'.active'] = 'required|boolean';

            foreach ($customRules as $key => $rules) {
                if (strpos($rules, 'active') !== false) {
                    $rules = str_replace('active', $i.'.active', $rules);
                }

                $result[$i.'.'.$key] = $rules;
            }
        }

        return $result;
    }
}
