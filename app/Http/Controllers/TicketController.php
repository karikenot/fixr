<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //halo kontoler
    public function create() {
        return view('tickets.create');
    }

    public function store(Request $request) {
        //validasi dulu haus validasi nihhhh
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'prioritas' => 'required|in:low,medium,high'
        ]);

        //polah
        Ticket::create([
            'user_id' => Auth::id() ?? 1, //1 nya tu fallback
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'prioritas' => $request->prioritas,
            'status' => 'open'
        ]);

        return redirect()->route('tickets.create')->with('success', 'sukses membuat tiket');
    }
}
