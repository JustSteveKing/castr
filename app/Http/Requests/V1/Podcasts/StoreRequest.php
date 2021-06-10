<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Podcasts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:250',
            ],
            'feed_url' => [
                'required',
                'url',
                'unique:podcasts,feed_url'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'feed_url.unique' => 'This podcast has already been registered.'
        ];
    }
}
