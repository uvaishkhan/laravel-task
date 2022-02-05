<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class EventsRequest extends FormRequest
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

        if ($this->id) {
            $event = [
                // 'name' => ['required', Rule::unique('event_management')],
                'name'            => 'required|unique:event_management,name,'.$this->id.',id', 
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'description' => 'required|string',
                'organizer' => 'required',
                'ticket' => 'nullable',               

            ];
        } else {

            $event = [
                // 'name' => ['required', Rule::unique('event_management')],
                'name'            => 'required|unique:event_management,name,'.$this->id.',id', 
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'description' => 'required|string',
                'organizer' => 'required',
                'ticket' => 'nullable',                

            ];
        }
        return $event;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'The :attribute field is required.',
            'end_date.after_or_equal' => "End date should be greater than or equal start date"
        ];
        return $messages;
    }


}
