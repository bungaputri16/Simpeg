<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $berita = Berita::paginate(12);
    return view('dashboard', compact('berita'));
    }
}
