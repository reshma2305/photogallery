<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "/admin/check-current-pwd","/admin/update-event-status","/admin/update-album-status","/admin/update-image-status","/admin/update-enquiry-status","/admin/update-service-status"
    ];
}
