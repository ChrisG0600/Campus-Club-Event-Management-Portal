<x-app-layout>
  <div class="py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Club Admin Dashboard') }}
      </h2>
      {{-- Club Selectors --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
        @forelse ( $manageClub as $club )
        <button type="button"
          data-club-id={{ $club->id}}
          data-club-name="{{ str_replace('"', '&quot;', $club->club_name) }}" {{-- Escape double quotes in the club name to safely include it as a data attribute --}}
          class="block p-6 bg-white border border-gray-200 rounded-xl shadow hover:bg-blue-50 transition club-card">
          <h5 class="text-lg font-semibold text-gray-900">{{ $club->club_name}}</h5>
          <p class="mt-1 text-sm text-gray-600">Manage members and applicants.</p>
        </button>
        @empty
        <div class="col-span-full text-center py-6">
          <h5 class="text-lg font-semibold text-gray-700">{{ __('No Club to Manage') }}</h5>
          <p class="mt-1 text-gray-500">{{ __('You are not currently managing any clubs.') }}</p>
        </div>
        @endforelse
      </div>
      {{-- Club Members --}}
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hidden" id="clubManagementSection">
        <div class="flex items-center justify-between">
          <h3 class="font-semibold text-lg text-gray-700 mb-4">{{ __('Manage Members & Applications Club: ') }}</h3>
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            type="button">
              Filter by section
              <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 011.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
          </button>          
        </div>
        {{-- Dropdown menu --}}
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <button data-status="all" class="filter-btn block px-4 py-2 text-gray-800 hover:rounded-md hover:bg-gray-200">Show All</button>
              </li>              
              <li>
                <button data-status="current" class="filter-btn block px-4 py-2 text-gray-800 hover:rounded-md hover:bg-gray-200">Current Members</button>
              </li>              
              <li>
                <button data-status="pending" class="filter-btn block px-4 py-2 text-gray-800 hover:rounded-md hover:bg-gray-200">Pending Applicants</button>
              </li>              
              <li>
                <button data-status="rejected" class="filter-btn block px-4 py-2 text-gray-800 hover:rounded-md hover:bg-gray-200">Rejected Applicants</button>
              </li>              
              <li>
                <button data-status="closed" class="filter-btn block px-4 py-2 text-gray-800 hover:rounded-md hover:bg-gray-200">Declined/Withdrawn</button>
              </li>              
          </ul>
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-6">
          <div data-status="current" class="status-section mb-6 md:mb-0">
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Current Members') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-700 bg-white rounded-md" id="currentMembersTableBody">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Student Number') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Joined On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Role') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          {{-- Pending Applicants --}}
          <div data-status="pending" class="status-section mb-6 md:mb-0">
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Pending Applicants') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table id="pendingApplicantsTable" class="w-full text-sm text-left text-gray-700 bg-white rounded-md">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Applied On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          {{-- Rejected Applicants --}}
          <div data-status="rejected" class="status-section mb-6 md:mb-0">
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Rejected Applicants') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table id="rejectedApplicantsTable" class="w-full text-sm text-left text-gray-700 bg-white rounded-md">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Student Number') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                    <th scope="col" class="py-3 px-2">{{ __('Submission Count') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Rejected On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          {{-- Declined/withdrawn Applicants --}}
          <div data-status="closed" class="status-section mb-6 md:mb-0">
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Declined and Withdrawn Applicants') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table id="declinedAndWithdrawnApplicantsTable" class="w-full text-sm text-left text-gray-700 bg-white rounded-md">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Applied On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>