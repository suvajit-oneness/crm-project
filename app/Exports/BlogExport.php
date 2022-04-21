<?php

namespace App\Exports;

use App\Models\Directory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
// used for autosizing columns
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BlogExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Directory::all();
    }

    public function map($categories): array
    {
        return [
            $categories->image,
            $categories->title,
            $categories->content,
            $categories->description,
            $categories->meta_title,
            $categories->meta_key,
            $categories->category_id,
            $categories->subcategory_id,
            ($categories->status == 1) ? 'Active' : 'Inactive',
            $categories->created_at,
        ];
    }

    public function headings(): array
    {
        return ['Image', 'Title', 'Content','Description', 'Meta Title','Meta Key','Category','SubCategory','Status','Created at'];
    }

}

