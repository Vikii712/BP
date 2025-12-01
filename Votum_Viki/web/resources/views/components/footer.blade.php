<!-- Footer -->
<footer class="bg-votum-blue text-white pt-5">
    <div class="">
        <!-- Top Section: Organization Name and Social Media -->
        <div class="text-center mb-8 pt-5 bg-blue-950">
            <h3 class="text-3xl font-bold mb-4 ">Združenie VOTUM</h3>
            <div class="flex justify-center gap-6">
                <a href="#" class="py-5 txt-btn-block flex text-blue-300 items-center gap-2" aria-label="Facebook">
                    <i class="fab fa-facebook text-3xl "></i>
                    <span class="text-lg">Facebook</span>
                </a>
                <a href="#" class="py-5 txt-btn-block flex items-center gap-2 text-red-300" aria-label="YouTube">
                    <i class="fab fa-youtube text-3xl"></i>
                    <span class="text-lg">YouTube</span>
                </a>
            </div>
        </div>

        <!-- Bottom Section: Navigation Links and Contact Info -->
        <div class="grid lg:grid-cols-2 gap-8 px-4 md:px-7 w-full">
            <div class="w-full">
                <h4 class="text-2xl font-bold mb-4 text-blue-300">{{ __('nav.nav')}}</h4>
                <div class="grid sm:grid-cols-2 text-lg w-full  text-center lg:text-left">
                    <div class="w-full">
                        <a href="{{route('main')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-home mr-2"></i>{{ __('nav.home')}}
                        </a>
                        <a href="{{route('about')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-users mr-2"></i>{{ __('nav.about')}}
                        </a>
                        <a href="{{route('events')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-calendar-alt mr-2"></i>{{ __('nav.events')}}
                        </a>
                        <a href="{{route('history')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-clock mr-2"></i>{{ __('nav.history')}}
                        </a>
                    </div>
                    <!-- Right Column -->
                    <div class="w-full">
                        <a href="{{route('support')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-hand-holding-heart mr-2"></i>{{ __('nav.support')}}
                        </a>
                        <a href="{{route('contacts')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-envelope mr-2"></i>{{ __('nav.contacts')}}
                        </a>
                        <a href="{{route('documents')}}" class="py-5 txt-btn-block block w-full">
                            <i class="fas fa-file-alt mr-2"></i>{{ __('nav.documents')}}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Half: Contact and Accessibility -->
            <div class=" w-full">
                <h4 class="text-2xl font-bold mb-4 text-blue-300">{{ __('nav.err')}}</h4>
                <div class="space-y-3 w-full text-center lg:text-right">
                    <p class="text-sm w-full">
                        <a href="mailto:admin@zdravieznevyhodnenie.sk" class="py-5 txt-btn-block inline-block text-lg underline w-full">
                            <i class="fas fa-envelope mr-2"></i>
                            zdruzenie.votum@gmail.com
                        </a>
                    </p>
                    <div class="mt-4 w-full">
                        <a href="{{ route('a11y') }}" class="py-5 txt-btn-block inline-block underline text-lg w-full">
                            <i class="fas fa-universal-access mr-2"></i>
                            {{ __('nav.acc')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
