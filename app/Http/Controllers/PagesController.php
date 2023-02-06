<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail;
class PagesController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        $first = 'Senn';
        $last = 'Linn';
        $full = $first . " " . $last;
        $email = 'Senn@linn.com';
        $data = [];
        $data['fullname'] = $full;
        $data['email'] = $email;
        return view('pages.about')->with("data", $data);
    }

    public function getContact()
    {
        return view('pages.Contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
            'survey' => ['Q1' => 'hello', 'Q2' => 'yes']
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@senn.io');
            $message->subject($data['subject']);
        });
        return redirect()->url('/')->with('success','Sent email successfully');
    }
}

