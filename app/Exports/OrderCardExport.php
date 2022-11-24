<?php

namespace App\Exports;

use App\Http\Resources\OrderCard\OrderCardExcelCollection;
use App\Models\OrderCard;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderCardExport implements FromCollection, WithHeadings
{
    protected $orderCard;
    protected array $headings   =   [];
    public function __construct($orderCard)
    {
        $this->orderCard    =   $orderCard;
        foreach ($orderCard as $order) {
            $item   =   $order->toArray();
            foreach ($item as $key=>$value) {
                $this->headings[]   =   $key;
            }
            break;
        }
    }

    public function collection(): OrderCardExcelCollection
    {
        return new OrderCardExcelCollection($this->orderCard);
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
