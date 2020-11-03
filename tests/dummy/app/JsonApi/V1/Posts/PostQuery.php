<?php

namespace DummyApp\JsonApi\V1\Posts;

use LaravelJsonApi\Core\Validation\Rule as JsonApiRule;
use LaravelJsonApi\Http\Requests\ResourceQuery;

class PostQuery extends ResourceQuery
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fields' => [
                'nullable',
                'array',
                JsonApiRule::fieldSets([]),
            ],
            'filter' => [
                'nullable',
                'array',
                JsonApiRule::filter([]),
            ],
            'include' => [
                'nullable',
                'string',
                JsonApiRule::includePaths('author'),
            ],
            'page' => JsonApiRule::notSupported(),
            'sort' => JsonApiRule::notSupported(),
        ];
    }
}