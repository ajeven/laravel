@extends('layouts.master')
@section('content')
    <h1>This is the number you gave me, {{ $number }}!</h1>
    	@if ($number)
    		<h1>This is your number +5, {{ $number+=5 }}</h1>
		@endif
@stop