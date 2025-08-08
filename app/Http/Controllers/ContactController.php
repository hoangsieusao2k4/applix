<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.lienhe'); // hiển thị form
    }

public function send(Request $request)
{
    $request->validate([
        'topic' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'description' => 'nullable',
        'file' => 'nullable|file|max:20480', // tối đa 20MB
    ]);

    $data = $request->only('topic', 'name', 'email', 'subject', 'description');
    $data['file'] = $request->file('file'); // lưu file vào mảng data

    Mail::to('behoang469@gmail.com')->send(new ContactMail($data));
    return back()->with('success', 'Gửi liên hệ thành công!');
}

}
