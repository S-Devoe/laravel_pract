<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter{

    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'gt', 'gte', 'lte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq'],
        'paidDate' => ['eq'],
        
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '=>',
        'lte' => '=<', 
    ];

   
    
}