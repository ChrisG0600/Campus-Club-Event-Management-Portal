<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-2 mb-6">
        {{ __('Welcome student ' .  Auth::user()->name) }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Your Current Clubs') }}</h3>
            <ul class="space-y-3">
              @forelse ($hasApplied as $application)
              <li class="bg-white rounded-md shadow-sm p-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                  <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-.447.894L15 14M5 18h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <h5 class="text-md font-semibold text-gray-600">{{ $application->club->club_name }}</h5>
                </div>
                <div>
                  @if ($application->status == 'rejected')
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    {{ __('Rejected') }}
                  </span>
                  @elseif ($application->status == 'pending')
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    {{ __('Pending') }}
                  </span>
                  @elseif ($application->status == 'withdrawn')
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 text-gray-500">
                    {{ __('Withdrawn') }}
                  </span>
                  @else
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    {{ __('Accepted') }}
                  </span>
                  @endif
                </div>
              </li>
              @empty
              <p class="text-gray-500">{{ __('You haven\'t applied to any clubs yet.') }}</p>
              @endforelse
            </ul>
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