<section class="bg-blue-50 py-8 md:py-16" id="events">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8 md:mb-12">{{ __('What Awaits Us?') }}</h2>

        <div class="grid lg:grid-cols-2 gap-6 md:gap-8">
            <!-- Calendar -->
            <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-4">{{ __('August 2025') }}</h3>
                <div class="grid grid-cols-7 gap-1 md:gap-2 text-center">
                    @foreach(['Po', 'Ut', 'St', 'Št', 'Pi', 'So', 'Ne'] as $day)
                        <div class="text-xs md:text-sm font-medium text-gray-600">{{ $day }}</div>
                    @endforeach

                    @php
                        $calendarDays = [
                            ['', '', '', '', '1', '2', '3'],
                            ['4', '5', '6', '7', '8', '9', '10'],
                            ['11', '12', '13', '14', '15', '16', '17'],
                            ['18', '19', '20', '21', '22', '23', '24'],
                            ['25', '26', '27', '28', '29', '30', '31']
                        ];
                        $eventDays = [9, 20, 29];
                    @endphp

                    @foreach($calendarDays as $week)
                        @foreach($week as $day)
                            @if($day !== '')
                                <div class="aspect-square flex items-center justify-center rounded-lg text-xs md:text-sm {{ in_array((int)$day, $eventDays) ? 'bg-blue-500 text-white font-bold' : 'bg-gray-50 text-gray-700' }} hover:bg-blue-200 transition-colors cursor-pointer">
                                    {{ $day }}
                                </div>
                            @else
                                <div></div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <button class="w-full mt-4 md:mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm md:text-base">
                    <i class="fas fa-calendar-plus mr-2"></i>
                    {{ __('Add to Your Calendar') }}
                </button>
            </div>

            <!-- Event List -->
            <div class="space-y-3 md:space-y-4">
                @php
                    $events = [
                        ['date' => '9.8.', 'name' => 'Koncert', 'sold_out' => true],
                        ['date' => '20.8.', 'name' => 'Vystúpenie', 'sold_out' => true],
                        ['date' => '29.8.', 'name' => 'Tábor', 'sold_out' => true]
                    ];
                @endphp

                @foreach($events as $event)
                    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs md:text-sm text-gray-500">{{ $event['date'] }}</p>
                                <h4 class="text-lg md:text-xl font-semibold text-gray-800">{{ $event['name'] }}</h4>
                            </div>
                            @if($event['sold_out'])
                                <span class="px-3 md:px-4 py-1 md:py-2 bg-red-100 text-red-600 rounded-lg text-xs md:text-sm font-medium whitespace-nowrap">
                                    {{ __('Sold Out') }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
