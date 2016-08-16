@extends('layouts.master')
@section('content')
    <h1>Your word, {{ $word }}!</h1>
    <h1>Your word made more intense, {{ strtoupper($word) }}!</h1>
@stop