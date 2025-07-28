<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Menampilkan semua pesan
    public function index()
    {
        $messages = Message::latest()->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    // Menghapus pesan
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}