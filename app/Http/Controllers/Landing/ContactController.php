<?php

namespace App\Http\Controllers\Landing;

use App\Helpers\PageHelper;
use App\Helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get contact page from CMS
        $contactPage = PageHelper::getContactPage();

        // If contact page doesn't exist, create a fallback
        if (!$contactPage) {
            $contactPage = PageHelper::createFallbackPage(
                'Contact Us',
                'Get in touch with our team. We\'re here to help and answer any questions you might have.',
                'contact, get in touch, help, support, message, email, phone, address'
            );
        }

        // Get contact information from settings
        $contactInfo = [
            'address' => SettingsHelper::get('contact_address', ''),
            'phone' => SettingsHelper::get('contact_phone', ''),
            'phone_secondary' => SettingsHelper::get('contact_phone_secondary', ''),
            'email' => SettingsHelper::get('contact_email', ''),
            'email_secondary' => SettingsHelper::get('contact_email_secondary', ''),
            'map_embed' => SettingsHelper::get('contact_map_embed', ''),
            'social_facebook' => SettingsHelper::get('social_facebook', ''),
            'social_twitter' => SettingsHelper::get('social_twitter', ''),
            'social_instagram' => SettingsHelper::get('social_instagram', ''),
            'social_linkedin' => SettingsHelper::get('social_linkedin', ''),
            'social_youtube' => SettingsHelper::get('social_youtube', ''),
        ];

        return view('landing.contact', compact('contactPage', 'contactInfo'));
    }

    /**
     * Store a newly created contact message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Create the contact message
            $contactMessage = ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 'pending'
            ]);

            // Send email notification to admin
            $adminEmail = SettingsHelper::get('admin_email', config('mail.from.address'));

            if ($adminEmail) {
                try {
                    Mail::to($adminEmail)->send(new ContactMessageReceived($contactMessage));
                } catch (\Exception $e) {
                    // Log the error but don't fail the request
                    \Log::error('Failed to send contact email: ' . $e->getMessage());
                }
            }

            // Flash success message to the session
            return redirect()->route('home.contact')
                ->with('success', 'Your message has been sent successfully. We will get back to you soon!');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Failed to save contact message: ' . $e->getMessage());

            // Flash error message to the session
            return redirect()->route('home.contact')
                ->with('error', 'An error occurred while sending your message. Please try again later.')
                ->withInput();
        }
    }


}
