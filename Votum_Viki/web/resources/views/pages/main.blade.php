@extends('layouts.app')

@section('content')
    <x-home.hero :hero="$hero"/>
    <x-home.calendar :events="$events" />
    <x-home.activities />
    <x-home.team />
@endsection

