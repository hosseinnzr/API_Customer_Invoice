<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoiceFilter extends ApiFilter {
    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq','lt','gt','lt','gte'.'lte'],
        'status' => ['eq','ne'],
        'billedDate' => ['eq','lt','gt','lt','gte'.'lte'],
        'paidDate' => ['eq','lt','gt','lt','gte'.'lte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    // example : http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=3000&type[eq]=B  
}