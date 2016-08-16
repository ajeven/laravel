@extends('layouts.master')
@section('content')
    <h1>Dice roll was, <?php echo $number; ?>!</h1>
    <h1>You guessed, <?php echo $guess; ?>!</h1>
    <div>
        <?php if ($guess == $number) { ?>
            <?php echo "Great Guess!!" ?>
        <?php } else { ?>
            <?php echo "Guess again my friend" ?>
        <?php } ?>
    </div >
    <ul>
    	<li><a href="{{ action('HomeController@rollDice', 1) }}">1</a></li>
    	<li><a href="{{ action('HomeController@rollDice', 2) }}">2</a></li>
    	<li><a href="{{ action('HomeController@rollDice', 3) }}">3</a></li>
    	<li><a href="{{ action('HomeController@rollDice', 4) }}">4</a></li>
    	<li><a href="{{ action('HomeController@rollDice', 5) }}">5</a></li>
    	<li><a href="{{ action('HomeController@rollDice', 6) }}">6</a></li>
    </ul>
@stop