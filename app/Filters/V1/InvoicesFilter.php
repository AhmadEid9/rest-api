<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter
{
    protected $allowedParams = [
        'customer_id' => ['eq'],
        'status' => ['eq', 'ne'],
        'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'billed_date' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'paid_date' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];

    protected $columnMap = [
        'customer_id' => 'customerId',
        'billed_date' => 'billedDate',
        'paid_date' => 'paidDate',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
