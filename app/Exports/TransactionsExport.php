<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction::orderBy('created_at','desc')->get();
        foreach ($transactions as $transaction) {
            $transaction->price += $transaction->unique_code;
        }
        $subset = $transactions->map(function ($transaction) {
            return collect($transaction->toArray())
            ->only(['transaction_id', 'product_name', 'price', 'cust_name', 'cust_email',
             'cust_phone', 'cust_address', 'cust_city', 'cust_state', 'cust_zipcode', 'status', 'created_at'])
            ->all();
        });
        return $subset;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Transaction ID',
            'Product Name',
            'Price',
            'Name',
            'Email',
            'Phone Number',
            'Address',
            'City',
            'State',
            'Zipcode',
            'Status',
            'Order Date',
        ];
    }
}
