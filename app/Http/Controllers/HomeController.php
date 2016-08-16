<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function math($number = 5)
    {
        $data = ['number' => $number];
		return view('math', $data);
    }
    public function CapsWord($word = 'codeup')
    {
        $data = ['word' => $word];
		return view('uppercase', $data);
    }
    public function rollDice ($guess = 4)
    {
    	$data = ['number' => rand(1, 6),
			'guess' => $guess
		];
		return view('roll-dice', $data);
		// can also return data like this
		// return view('roll-dice')->with($data);
    }

}