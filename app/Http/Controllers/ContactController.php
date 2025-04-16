<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|min:10',
            ]);

            // Send email with 5-second timeout
            Mail::to('aminesorati35@gmail.com')
                ->send(new ContactFormMail($validated));

            return back()->with('success', 'Your message has been sent successfully!');

        } catch (\Swift_TransportException $e) {
            Log::error('Mail transport error: '.$e->getMessage());
            return back()->with('error', 'Failed to send message. Please try again later.');
        } catch (\Exception $e) {
            Log::error('Contact form error: '.$e->getMessage());
            return back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}