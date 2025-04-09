<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Upcoming Events') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('All Scheduled Events') }}</h3>
          <ul class="space-y-6">
            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <div class="md:flex md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                  <h4 class="font-semibold text-indigo-700">{{ __('Tech Talk: AI for Beginners') }}</h4>
                  <p class="text-gray-500 text-sm">{{ __('Organized by:') }} {{ __('Computer Science Society') }}</p>
                  <p class="text-gray-500 text-sm">{{ __('Date:') }} {{ __('April 19, 2025') }} | {{ __('Time:') }} {{
                    __('2:00 PM - 3:30 PM') }}</p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('An introductory session to the fundamentals of Artificial
                    Intelligence. No prior experience required!') }}</p>
                </div>
                <a href="#"
                  class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Details') }}
                </a>
              </div>
            </li>
            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <div class="md:flex md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                  <h4 class="font-semibold text-green-700">{{ __('Creative Writing Workshop: Poetry') }}</h4>
                  <p class="text-gray-500 text-sm">{{ __('Organized by:') }} {{ __('Literary Society') }}</p>
                  <p class="text-gray-500 text-sm">{{ __('Date:') }} {{ __('April 23, 2025') }} | {{ __('Time:') }} {{
                    __('4:00 PM - 5:30 PM') }}</p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('Explore the art of poetry writing with guided exercises
                    and feedback.') }}</p>
                </div>
                <a href="#"
                  class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Details') }}
                </a>
              </div>
            </li>
            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <div class="md:flex md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                  <h4 class="font-semibold text-blue-700">{{ __('Campus Cleanup Drive') }}</h4>
                  <p class="text-gray-500 text-sm">{{ __('Organized by:') }} {{ __('Student Government') }}</p>
                  <p class="text-gray-500 text-sm">{{ __('Date:') }} {{ __('April 27, 2025') }} | {{ __('Time:') }} {{
                    __('9:00 AM - 12:00 PM') }}</p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('Join us in making our campus cleaner and greener!
                    Volunteers are welcome.') }}</p>
                </div>
                <a href="#"
                  class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Details') }}
                </a>
              </div>
            </li>
            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <div class="md:flex md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                  <h4 class="font-semibold text-pink-700">{{ __('Music Club Open Mic Night') }}</h4>
                  <p class="text-gray-500 text-sm">{{ __('Organized by:') }} {{ __('Music Club') }}</p>
                  <p class="text-gray-500 text-sm">{{ __('Date:') }} {{ __('May 3, 2025') }} | {{ __('Time:') }} {{
                    __('7:00 PM - 9:00 PM') }}</p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('Come and showcase your musical talents or simply enjoy an
                    evening of live performances.') }}</p>
                </div>
                <a href="#"
                  class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Details') }}
                </a>
              </div>
            </li>
            {{-- More events will be listed here --}}
          </ul>

          {{-- <div class="mt-6">
            <nav role="navigation" aria-label="Pagination Navigation">
              <ul class="flex justify-between">
                <li class="w-1/2 mr-1">
                  <a href="#"
                    class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Previous') }}
                  </a>
                </li>
                <li class="w-1/2 ml-1">
                  <a href="#"
                    class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Next') }}
                  </a>
                </li>
              </ul>
            </nav>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>