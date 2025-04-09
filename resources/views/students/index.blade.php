<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-2 mb-6">
        {{ __('Welcome student ' .  Auth::user()->name) }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Your Clubs') }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ __('Quick access to the clubs you\'ve joined.') }}</p>
            <ul class="space-y-3">
              <li class="flex items-center justify-between">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4.354l-2 2m0 0l-2-2m2 2L12 11.646M16 12a4 4 0 01-8 0 4 4 0 018 0z"></path>
                  </svg>
                  <span class="text-gray-600">{{ __('Computer Science Society') }}</span>
                </div>
                <a href="#" class="text-indigo-500 hover:underline text-sm">{{ __('Visit') }}</a>
              </li>
              <li class="flex items-center justify-between">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2h-3l-4-4z">
                    </path>
                  </svg>
                  <span class="text-gray-600">{{ __('Debate and Public Speaking Club') }}</span>
                </div>
                <a href="#" class="text-indigo-500 hover:underline text-sm">{{ __('Visit') }}</a>
              </li>
            </ul>
            <a href="#" class="block mt-4 text-indigo-500 hover:underline text-sm">{{ __('See All Your Clubs') }}</a>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('What\'s Happening Soon?') }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ __('Upcoming events you might be interested in.') }}</p>
            <ul class="space-y-3">
              <li class="flex items-center justify-between">
                <div>
                  <h4 class="font-semibold text-gray-700">{{ __('Tech Talk: AI for Beginners') }}</h4>
                  <span class="text-sm text-gray-500">{{ __('April 19, 2:00 PM') }}</span>
                </div>
                <a href="#" class="text-green-500 hover:underline text-sm">{{ __('Details') }}</a>
              </li>
              <li class="flex items-center justify-between">
                <div>
                  <h4 class="font-semibold text-gray-700">{{ __('Creative Writing Workshop: Poetry') }}</h4>
                  <span class="text-sm text-gray-500">{{ __('April 23, 4:00 PM') }}</span>
                </div>
                <a href="#" class="text-green-500 hover:underline text-sm">{{ __('Details') }}</a>
              </li>
            </ul>
            <a href="#" class="block mt-4 text-green-500 hover:underline text-sm">{{ __('Explore All Events') }}</a>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-2">
          <div class="p-6 bg-white border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Latest Updates & Announcements') }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ __('Stay informed about important news from clubs and the campus.')
              }}</p>
            <ul class="space-y-4">
              <li class="text-sm text-gray-600">
                <span class="font-semibold">{{ __('University Announcement:') }}</span> <a href="#"
                  class="text-blue-500 hover:underline">{{ __('Important Guidelines for Midterm Exams') }}</a>
                <span class="text-gray-400 text-xs">{{ __('(Posted April 7)') }}</span>
              </li>
              <li class="text-sm text-gray-600">
                <span class="font-semibold">{{ __('Computer Science Society:') }}</span> <a href="#"
                  class="text-blue-500 hover:underline">{{ __('Meeting Schedule Changed for Next Week') }}</a>
                <span class="text-gray-400 text-xs">{{ __('(Posted Today)') }}</span>
              </li>
            </ul>
            <a href="#" class="block mt-4 text-blue-500 hover:underline text-sm">{{ __('See All Announcements') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>