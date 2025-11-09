<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::with('category')
            ->get()
            ->map(function ($product) {
                return [
                    'ID' => $product->id,
                    'Name' => $product->name,
                    'SKU' => $product->sku,
                    'Price' => $product->price,
                    'Stock' => $product->stock,
                    'Category' => $product->category->name ?? 'No Category',
                    'Status' => $product->status,
                    'Description' => $product->description,
                    'Created At' => $product->created_at,
                    'Updated At' => $product->updated_at,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'SKU',
            'Price',
            'Stock',
            'Category',
            'Status',
            'Description',
            'Created At',
            'Updated At',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,    // ID
            'B' => 300,   // Name
            'C' => 20,   // SKU
            'D' => 10,   // Price
            'E' => 10,   // Stock
            'F' => 25,   // Category
            'G' => 12,   // Status
            'H' => 50,   // Description
        ];
    }
}
