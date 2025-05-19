<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Mark as read if it's pending
        if ($message->status === 'pending') {
            $message->status = 'read';
            $message->save();
        }
        
        return view('admin.contact-messages.show', compact('message'));
    }

    public function markAsReplied($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->status = 'replied';
        $message->save();
        
        Alert::success('Success', 'Message marked as replied successfully.');
        return redirect()->route('admin.contact-messages.index');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        
        Alert::success('Success', 'Message deleted successfully.');
        return redirect()->route('admin.contact-messages.index');
    }
}
