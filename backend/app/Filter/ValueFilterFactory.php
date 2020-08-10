<?php


namespace App\Filter;


use App\Service\Database\QueryFilter\ValueFilter;
use Illuminate\Http\Request;

class ValueFilterFactory
{
    /**
     * @param Request $request
     * @return ValueFilter
     */
    public static function createFromRequest(Request $request)
    {
        $requestUri = $request->server('REQUEST_URI');
        preg_match('#.*?\?(.*)#ius', $requestUri, $query);

        if (!isset($query[1])) {
            return new ValueFilter([]);
        }

        $queryParts = explode('&', $query[1]);

        if ($queryParts[0] === '') {
            return new ValueFilter([]);
        }

        $metadata = [];
        $filterValues = [];

        foreach ($queryParts as $part) {
            $compositePart = explode('=', $part);

            list($key, $value) = $compositePart;

            if ($key === 'page' || $key === 'perPage') {
                $metadata[$key] = $value;
            } else {
                $filterValues[$key] = $value;
            }
        }

        $filter = new ValueFilter($metadata);

        foreach ($filterValues as $filterKey => $filterValue) {
            preg_match('#(.*?)\[(.*?)\]#ius', $filterKey, $matches);
            $operator = isset($matches[1]) ? $matches[1] : '=';

            if (isset($matches[1]) && isset($matches[2])) {
                $filter->add($matches[1], $matches[2], $filterValue);
            } else {
                $filter->add($filterKey, $operator, $filterValue);
            }
        }

        return $filter;
    }
}
