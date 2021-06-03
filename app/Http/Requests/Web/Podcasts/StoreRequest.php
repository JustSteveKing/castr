<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Podcasts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string'],
            'external_url' => ['required', 'url'],
            'feed_url' => ['required', 'url'],
        ];
    }
}
