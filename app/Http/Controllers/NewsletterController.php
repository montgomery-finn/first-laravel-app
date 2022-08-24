<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\INewsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(INewsletter $newsletter){
        request()->validate([
            'email' => 'required|email'
        ]);
    
        try{
    
            $newsletter->subscribe(request('email'));
            
        } catch(Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
        
        return redirect('/')->with('success', 'You are now signed up to our newsletter list');
    }
}
