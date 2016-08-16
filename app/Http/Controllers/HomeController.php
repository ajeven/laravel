<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function math($number)
    {
        $data = ['number' => $number];
		return view('math', $data);
    }
    public function CapsWord($word)
    {
        $data = ['word' => $word];
		return view('uppercase', $data);
    }

}