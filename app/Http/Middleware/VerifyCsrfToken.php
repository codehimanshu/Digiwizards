<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'rfid/checkpayment','app/circulate','storetest','testing','toll_amount','upload_image','external_transaction','transaction','card_balance','add_money'
    ];
}
