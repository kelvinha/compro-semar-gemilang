<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.newsletter-subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.newsletter-subscribers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $request->email,
            'status' => 'active',
        ]);

        Alert::success('Success', 'Subscriber added successfully.');
        return redirect()->route('admin.newsletter-subscribers.index');
    }

    public function edit($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        return view('admin.newsletter-subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $subscriber->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);

        Alert::success('Success', 'Subscriber updated successfully.');
        return redirect()->route('admin.newsletter-subscribers.index');
    }

    public function destroy($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        $subscriber->delete();
        
        Alert::success('Success', 'Subscriber deleted successfully.');
        return redirect()->route('admin.newsletter-subscribers.index');
    }

    public function export()
    {
        $subscribers = NewsletterSubscriber::where('status', 'active')->get();
        $emails = $subscribers->pluck('email')->implode(',');
        
        return response()->streamDownload(function() use ($emails) {
            echo $emails;
        }, 'newsletter-subscribers.csv');
    }
}
