<?php

namespace App\Http\Requests;

use App\Models\Village;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class VillageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
        $village = Village::find($id);
        $code = $village ? $village->code : 0;
        return [
            'code' => ['required', 'numeric', 'digits_between:1,10', Rule::unique('indonesia_villages', 'code')->ignore($code, 'code')],
            'district_code' => 'required|numeric|digits_between:1,7',
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'meta' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
