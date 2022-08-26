<?php

namespace App\Http\Requests\post;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{

    protected function prepareForValidation(){
        $this -> merge([
            //'slug'=>Str::slug($this->title)
            //'slug' => Str::of($this->title)->slug()->append("-adicional"),
            'slug'=> str($this->title)->slug()

        ]);
        }

   

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        //dd($this->route("post")->id);
        return [
            'title'=>"required|min:5|max:500",
            'slug'=>"required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
            'content'=>"required|min:7", 
            'category_id'=>"required|integer", 
            'description'=>"required|min:7", 
            'posted'=>"required",
            'image'=>"required|mimes:png|max:2000"

            
        ];
    }
}