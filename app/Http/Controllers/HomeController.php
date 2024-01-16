<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;


class HomeController extends Controller
{
    public function index() {
        $currentDate = now()->toDateString();
        $trains = Train::whereDate('data_di_partenza', '=', $currentDate)->get();
        dd($trains, $currentDate);
        return view('home', compact('trains'));
    }
}
