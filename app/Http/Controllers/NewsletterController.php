<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request, Newsletter $mailchimp_newsletter)
    {
        $request->validate(['email' => ['required', 'email']]);

        try {
            $mailchimp_newsletter->subscribe($request->input('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ]);
        }

        return to_route('home')->with('success', 'You are now signed up for our newsletter');
    }
}
