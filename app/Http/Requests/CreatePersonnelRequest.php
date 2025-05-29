<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonnelRequest extends FormRequest
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
            'firstname' => 'required|string|max:70',
            'surname' => 'required|string|max:70',
            'othername' => 'nullable|string|max:70',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'designation' => 'nullable|string|max:50',
            'department' => 'nullable|string|max:70',
            'phone_number' => 'nullable|string|max:100',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx,jpeg,jpg,png,gif|max:2048',
            'state_of_origin' => 'nullable|string|max:70',
            'address' => 'nullable|string|max:100',
            'salary' => 'nullable|string',
            'highest_certificate' => 'nullable|string|max:30',
            // 'staff_id' => 'required|string|unique:personnels,staffId',
            'dob' => 'nullable|date',
            'nationality' => 'nullable|string|max:30',
            'marital_status' => 'nullable|string|max:30',
            'employement_date' => 'nullable|date',
        ];
    }
}
