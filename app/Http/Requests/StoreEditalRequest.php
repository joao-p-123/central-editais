<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'area' => ['required', 'string', 'max:255'],
            'territory' => ['required', 'string', 'max:255'],
            'deadline' => ['required', 'date'],
            'official_link' => ['nullable', 'url', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'description.required' => 'A descrição é obrigatória.',
            'area.required' => 'A área é obrigatória.',
            'territory.required' => 'O território é obrigatório.',
            'deadline.required' => 'O prazo é obrigatório.',
            'deadline.date' => 'Informe uma data válida.',
            'official_link.url' => 'Informe uma URL válida.',
        ];
    }
}
