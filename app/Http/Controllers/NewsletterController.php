<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => ['required', 'email']]);

        try {
            $newsletter->subscribe(request('email'));
    
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This Email could not be added to the newsletter',
            ]);
        }
    
        return redirect('/')->with('success', 'You are now subscribed to our newsletter.');
           
    }
}
