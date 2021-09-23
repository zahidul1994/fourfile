<?php

namespace App\Exports;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class Customerexcelform implements FromView
{
    public function  __construct($request)
    {
        $this->info= $request->password;
    }
    public function view(): View
    {
        return view('excel.index', [
            'infos' =>  $this->info,
        ]);
    }
}