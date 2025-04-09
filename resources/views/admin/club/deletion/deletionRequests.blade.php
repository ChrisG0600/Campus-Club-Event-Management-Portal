<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-md">
        <div class="p-6 border-b border-gray-200">
          <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Club Deletion Requests') }}
            </h2>
            <a href="#" onclick="window.history.back();"
              class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
              {{ __('Back') }}
            </a>
          </div>
          <p class="mt-2 text-sm text-gray-500">{{ __('Review and manage pending club deletion requests.') }}</p>
        </div>
        <ul role="list" class="divide-y divide-gray-200">
          <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-base font-semibold text-indigo-700">{{ __('Science Club') }}</p>
                <p class="mt-1 text-sm text-gray-500">{{ __('Requested by:') }} <span
                    class="font-medium text-gray-700">{{ __('John Doe') }}</span></p>
                <p class="text-xs text-gray-400">{{ __('Requested on: 2025-04-09') }}</p>
              </div>
              <div class="flex flex-shrink-0 space-x-2">
                <a href="#"
                  class="inline-flex items-center rounded-md bg-green-50 px-3 py-2 text-sm font-medium text-green-700 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                  <svg class="-ml-1 me-2 h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ __('Approve') }}
                </a>
                <a href="#"
                  class="inline-flex items-center rounded-md bg-red-50 px-3 py-2 text-sm font-medium text-red-700 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500">
                  <svg class="-ml-1 me-2 h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ __('Reject') }}
                </a>
              </div>
            </div>
          </li>
          <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-base font-semibold text-indigo-700">{{ __('Chess Club') }}</p>
                <p class="mt-1 text-sm text-gray-500">{{ __('Requested by:') }} <span
                    class="font-medium text-gray-700">{{ __('Jane Smith') }}</span></p>
                <p class="text-xs text-gray-400">{{ __('Requested on: 2025-04-10') }}</p>
              </div>
              <div class="flex flex-shrink-0 space-x-2">
                <a href="#"
                  class="inline-flex items-center rounded-md bg-green-50 px-3 py-2 text-sm font-medium text-green-700 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                  <svg class="-ml-1 me-2 h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ __('Approve') }}
                </a>
                <a href="#"
                  class="inline-flex items-center rounded-md bg-red-50 px-3 py-2 text-sm font-medium text-red-700 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500">
                  <svg class="-ml-1 me-2 h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ __('Reject') }}
                </a>
              </div>
            </div>
          </li>
          <li class="px-4 py-4 sm:px-6 text-center text-sm text-gray-500">
            {{ __('No more deletion requests.') }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</x-app-layout>