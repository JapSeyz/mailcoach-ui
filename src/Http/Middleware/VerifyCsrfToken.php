<?php

namespace Spatie\MailcoachUi\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;

    protected $except = [
        'mailgun-feedback',
        'ses-feedback',
        'sendgrid-feedback',

    ];
}
