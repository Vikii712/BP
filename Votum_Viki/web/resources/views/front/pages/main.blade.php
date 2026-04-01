@extends('front.layouts.app')

@section('content')
    <x-front::home.hero :hero="$hero" :image="$heroImage"/>
    <x-front::home.activities :events="$homeEvents"/>
    <x-front::home.calendar
        :calendarEvents="$calendarEvents"
        :calendarTitles="$calendarTitles"
    />
    <x-front::home.team :team="$team" :image="$teamImage"/>
@endsection
