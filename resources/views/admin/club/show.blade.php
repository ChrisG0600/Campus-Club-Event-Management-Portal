<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Club Management') }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow sm:rounded-md">
          <div class="p-6 flex flex-col justify-between h-full">
            <div>
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Club Deletion Requests') }}</h3>
                <span
                  class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">
                  2 {{ __('Pending') }}
                </span>
              </div>
              <p class="mt-1 text-sm text-gray-500">{{ __('Manage requests from clubs to delete their registration.') }}
              </p>
            </div>
            <div class="mt-6">
              <a href="{{ route('super_admin.showClubDeletionRequests') }}"
                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.932 3.374h14.74c1.716 0 2.803-1.874 1.932-3.376l-9.303-1.693z" />
                </svg>
                {{ __('View Deletion Requests') }}
              </a>
            </div>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-md">
          <div class="p-6 flex flex-col justify-between h-full">
            <div>
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Registered Clubs') }}</h3>
                <span
                  class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                  50 {{ __('Clubs') }}
                </span>
              </div>
              <p class="mt-1 text-sm text-gray-500">{{ __('View and manage all registered clubs.') }}</p>
            </div>
            <div class="mt-6">
              <a href="{{ route('super_admin.showRegisteredClubs')}}"
                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.05-.05.121-.075.196-.075h10.5c.442 0 .802.346.802.771v11.457c0 .425-.36.771-.802.771H11.408c-.076 0-.147-.025-.196-.075L2.25 12z" />
                </svg>
                {{ __('Manage Registered Clubs') }}
              </a>
            </div>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-md">
          <div class="p-6 flex flex-col justify-between h-full">
            <div>
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Pending Club Registrations') }}</h3>
                <span
                  class="inline-flex items-center rounded-full bg-orange-100 px-2.5 py-0.5 text-xs font-medium text-orange-800">
                  100 {{ __('Pending') }}
                </span>
              </div>
              <p class="mt-1 text-sm text-gray-500">{{ __('Review and approve or reject new club registration
                requests.') }}</p>
            </div>
            <div class="mt-6">
              <a href="{{ route('super_admin.showClubRegistrationRequests') }}"
                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375H17.25m0 0a3.375 3.375 0 01-3.375-3.375m3.375 3.375V12m0 0a3.375 3.375 0 00-3.375 3.375m3.375-3.375H12.75m0 0a3.375 3.375 0 01-3.375 3.375m3.375-3.375v-2.625M9.75 14.25H12" />
                </svg>
                {{ __('View Pending Registrations') }}
              </a>
            </div>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow sm:rounded-md">
          <div class="p-6 flex flex-col justify-between h-full">
            <div>
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">{{ __('Pending Announcements') }}</h3>
                <span
                  class="inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1">
                  5 {{ __('Pending') }}
                </span>
              </div>
              <p class="mt-1 text-sm text-gray-500">{{ __('Review and approve or reject announcements from clubs.') }}
              </p>
            </div>
            <div class="mt-6">
              <a href="{{ route('super_admin.showPendingAnnouncement') }}"
                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0h-7.5M12 6a9 9 0 110 18 9 9 0 010-18z" />
                </svg>
                {{ __('Review Announcements') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>