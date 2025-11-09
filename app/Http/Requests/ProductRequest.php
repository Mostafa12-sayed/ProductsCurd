<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter product name',
            'name.string' => 'Product name should be a string',
            'name.max' => 'Product name should not be more than 255 characters',
            'sku.string' => 'SKU should be a string',
            'sku.max' => 'SKU should not be more than 255 characters',
            'price.required' => 'Please enter product price',
            'price.numeric' => 'Product price should be a number',
            'price.min' => 'Product price should be greater than or equal to 0',
            'stock.required' => 'Please enter product stock',
            'stock.integer' => 'Product stock should be an integer',
            'stock.min' => 'Product stock should be greater than or equal to 0',
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'Selected category does not exist',
            'description.string' => 'Product description should be a string',
            'status.required' => 'Please select a status',
            'status.in' => 'Invalid status value',
            'image.image' => 'Please upload a valid image file',
            'image.mimes' => 'Image file should be in JPG, JPEG, or PNG format',
            'image.max' => 'Image file size should not exceed 2MB',
        ];

    }
}
