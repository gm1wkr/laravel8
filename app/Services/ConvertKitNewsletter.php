<?php
namespace App\Services;
use App\Services\Newsletter;

class ConvertKitNewsletter implements Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        // Subscribe the user with ConvertKit specific API.
    }
}
