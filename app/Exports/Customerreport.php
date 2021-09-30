<?php
namespace App\Exports;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class Customerreport implements FromCollection,WithHeadings
{
    protected $id;

    public function __construct($id)
    {
        $this->invoices = $id;
    }

    public function collection()
    {
        return Bill::wherecustomer_id($this->invoices)->select( 'customer_id',
        'monthlyrent',
        'due',
        'addicrg',
        'discount',
        'advance',
        'vat',
        'paid',
        'total',)->get();
    }
    public function headings(): array
    {
        return [
            'customer_id',
            'monthlyrent',
            'due',
            'addicrg',
            'discount',
            'advance',
            'vat',
            'paid',
            'total',
            
            
        ];
    }
}
