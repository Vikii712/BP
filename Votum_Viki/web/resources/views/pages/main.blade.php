@extends('layouts.app')

@section('content')
    <x-home.hero :hero="$hero" :image="$heroImage"/>
    <x-home.calendar :events="$events" />
    <x-home.activities />
    <x-home.team :team="$team" :image="$teamImage"/>
@endsection
