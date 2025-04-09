<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Club Admin Dashboard') }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-indigo-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Create New Club') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('Start a new community for students with shared interests.') }}
            </p>
            <a href="{{ route('club_admin.showForm')}}"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Create Now') }}
            </a>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m12-2H7m12-2h3l-5-5V19m2-2h-1M8 16l2-2m0 0l2 2m-2-2v2m-2-2h2">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Manage My Clubs') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('View and edit the clubs you administer.') }}</p>
            <a href="{{ route('club_admin.manage') }}"
              class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Go to My Clubs') }}
            </a>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7m5-4v8m-5-4h4">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Application Process') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('Review and manage student requests to join your clubs.') }}</p>
            <a href="{{ route('club_admin.showApplicant') }}"
              class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('View Applications') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>