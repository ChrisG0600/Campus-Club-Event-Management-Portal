<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-md">
        <div class="p-6 border-b border-gray-200">
          <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Registered Clubs') }}
            </h2>
            <a href="{{ route('super_admin.showClubs') }}"
              class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
              {{ __('Back to Club Management') }}
            </a>
          </div>
          <p class="mt-2 text-sm text-gray-500">{{ __('View and manage the status of all registered clubs.') }}</p>
        </div>
        <ul role="list" class="divide-y divide-gray-200">
          <li
            class="px-4 py-4 sm:px-6 flex items-center justify-between hover:bg-gray-50 transition-colors duration-150">
            <div>
              <p class="text-base font-semibold text-indigo-700">{{ __('Science Club') }}</p>
              <p class="mt-1 text-sm text-gray-500">{{ __('President:') }} <span class="font-medium text-gray-700">{{
                  __('John Doe') }}</span></p>
              <p class="text-xs text-gray-400">{{ __('Registered on: 2025-03-15') }}</p>
            </div>
            <div class="flex items-center space-x-2">
              <span
                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700">
                {{ __('Active') }}
              </span>
              <button type="button" data-modal-target="view-club-1" data-modal-toggle="view-club-1"
                class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('View') }}
              </button>
              <a href="#"
                class="inline-flex items-center rounded-md bg-red-100 px-2.5 py-1.5 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                {{ __('Deactivate') }}
              </a>
            </div>
          </li>
          <li
            class="px-4 py-4 sm:px-6 flex items-center justify-between hover:bg-gray-50 transition-colors duration-150">
            <div>
              <p class="text-base font-semibold text-indigo-700">{{ __('Chess Club') }}</p>
              <p class="mt-1 text-sm text-gray-500">{{ __('President:') }} <span class="font-medium text-gray-700">{{
                  __('Jane Smith') }}</span></p>
              <p class="text-xs text-gray-400">{{ __('Registered on: 2025-03-20') }}</p>
            </div>
            <div class="flex items-center space-x-2">
              <span
                class="inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700">
                {{ __('Active') }}
              </span>
              <button type="button" data-modal-target="view-club-2" data-modal-toggle="view-club-2"
                class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('View') }}
              </button>
              <a href="#"
                class="inline-flex items-center rounded-md bg-red-100 px-2.5 py-1.5 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                {{ __('Deactivate') }}
              </a>
            </div>
          </li>
          <li
            class="px-4 py-4 sm:px-6 flex items-center justify-between hover:bg-gray-50 transition-colors duration-150">
            <div>
              <p class="text-base font-semibold text-indigo-700">{{ __('Debate Club') }}</p>
              <p class="mt-1 text-sm text-gray-500">{{ __('President:') }} <span class="font-medium text-gray-700">{{
                  __('Peter Jones') }}</span></p>
              <p class="text-xs text-gray-400">{{ __('Registered on: 2025-03-25') }}</p>
            </div>
            <div class="flex items-center space-x-2">
              <span
                class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-medium text-red-700">
                {{ __('Inactive') }}
              </span>
              <button type="button" data-modal-target="view-club-3" data-modal-toggle="view-club-3"
                class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('View') }}
              </button>
              <a href="#"
                class="inline-flex items-center rounded-md bg-green-100 px-2.5 py-1.5 text-xs font-medium text-green-700 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{ __('Activate') }}
              </a>
            </div>
          </li>
          <li class="px-4 py-4 sm:px-6 text-center text-sm text-gray-500">
            {{ __('Total Registered Clubs: 3') }}
          </li>
        </ul>
      </div>
    </div>
  </div>

<div id="view-club-1" tabindex="-1" data-modal-backdrop="static"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-900">
          {{ __('Science Club Details') }}
        </h3>
        <button type="button"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
          data-modal-hide="view-club-1">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">{{ __('Close modal') }}</span>
        </button>
      </div>
      <div class="p-4 md:p-5 grid grid-cols-1 gap-4">
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Club Name') }}</span>
          <span class="block text-lg font-semibold text-indigo-700">{{ __('Science Club') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('President') }}</span>
          <span class="block text-base text-gray-800">{{ __('John Doe') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Club Email') }}</span>
          <span class="block text-base text-gray-800">{{ __('science.club@example.com') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Registration Date') }}</span>
          <span class="block text-base text-gray-800">{{ __('2025-03-15') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Description') }}</span>
          <span class="block text-base text-gray-800">{{ __('A club for students interested in science and technology.')
            }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Members') }}</span>
          <span class="block text-lg font-semibold text-green-600">{{ __('55') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="view-club-2" tabindex="-1"
  class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow">
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-gray-900">
          {{ __('Chess Club Details') }}
        </h3>
        <button type="button"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
          data-modal-hide="view-club-2">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">{{ __('Close modal') }}</span>
        </button>
      </div>
      <div class="p-4 md:p-5 grid grid-cols-1 gap-4">
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Club Name') }}</span>
          <span class="block text-lg font-semibold text-indigo-700">{{ __('Chess Club') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('President') }}</span>
          <span class="block text-base text-gray-800">{{ __('Jane Smith') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Club Email') }}</span>
          <span class="block text-base text-gray-800">{{ __('chess.club@example.com') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Registration Date') }}</span>
          <span class="block text-base text-gray-800">{{ __('2025-03-20') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Description') }}</span>
          <span class="block text-base text-gray-800">{{ __('A club for playing and learning about chess.') }}</span>
        </div>
        <div class="bg-gray-50 rounded-md p-3">
          <span class="block text-sm font-medium text-gray-700">{{ __('Members') }}</span>
          <span class="block text-lg font-semibold text-green-600">{{ __('32') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

</x-app-layout>
