@extends('layouts.app')

@section('content')
    <x-home.hero :hero="$hero" :image="$heroImage"/>
    <x-home.calendar
                    :calendarEvents="$calendarEvents"
                     :upcomingEvents="$upcomingEvents"
    />
    <x-home.activities :events="$homeEvents"
    />
    <x-home.team :team="$team" :image="$teamImage"/>
@endsection
