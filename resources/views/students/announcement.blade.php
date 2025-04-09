<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Campus Announcements') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Latest Announcements') }}</h3>
          <ul class="space-y-4">
            <li class="py-2 border-b border-gray-200">
              <div class="flex justify-between items-start">
                <div>
                  <h4 class="font-semibold text-indigo-700">
                    <a href="#">{{ __('Important Update: Midterm Exam Schedule') }}</a>
                  </h4>
                  <p class="text-gray-500 text-sm">
                    {{ __('Posted by:') }} {{ __('University Administration') }} |
                    {{ __('Date:') }} {{ __('April 8, 2025') }}
                  </p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('Please be advised of a slight adjustment to the midterm
                    examination schedule...') }}</p>
                </div>
                <span
                  class="inline-block bg-blue-100 text-blue-700 rounded-full px-2 py-1 text-xs font-semibold ml-4">{{
                  __('Campus') }}</span>
              </div>
            </li>
            <li class="py-2 border-b border-gray-200">
              <div class="flex justify-between items-start">
                <div>
                  <h4 class="font-semibold text-green-700">
                    <a href="#">{{ __('Computer Science Society Meeting - Next Week') }}</a>
                  </h4>
                  <p class="text-gray-500 text-sm">
                    {{ __('Posted by:') }} {{ __('Computer Science Society') }} |
                    {{ __('Date:') }} {{ __('April 7, 2025') }}
                  </p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('Reminder that our next general meeting will be held on
                    April 15th at 3:00 PM in the IT Lab...') }}</p>
                </div>
                <span
                  class="inline-block bg-green-100 text-green-700 rounded-full px-2 py-1 text-xs font-semibold ml-4">{{
                  __('Club') }}</span>
              </div>
            </li>
            <li class="py-2 border-b border-gray-200">
              <div class="flex justify-between items-start">
                <div>
                  <h4 class="font-semibold text-yellow-700">
                    <a href="#">{{ __('Call for Volunteers: Campus Cleanup Drive') }}</a>
                  </h4>
                  <p class="text-gray-500 text-sm">
                    {{ __('Posted by:') }} {{ __('Student Government') }} |
                    {{ __('Date:') }} {{ __('April 6, 2025') }}
                  </p>
                  <p class="text-gray-600 text-sm mt-1">{{ __('We are organizing a campus-wide cleanup drive on
                    Saturday, April 20th. Your help would be greatly appreciated...') }}</p>
                </div>
                <span
                  class="inline-block bg-yellow-100 text-yellow-700 rounded-full px-2 py-1 text-xs font-semibold ml-4">{{
                  __('Event') }}</span>
              </div>
            </li>
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