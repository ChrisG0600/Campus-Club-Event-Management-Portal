<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Manage your Club and Announcement') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Manage Your Clubs') }}</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          @forelse ( $clubs as $club)
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-indigo-700">{{ __('Club Name: ')}}{{ $club->club_name}}</h4>
              <p class="text-gray-600 text-sm mb-2">{{ __('Club President:') }} {{ $club->creator->name}}</p>
              <div class="mt-2">
                <a href="{{ route('club_admin.edit', $club->id) }}"
                class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Edit Club') }}</a>
                  <button
                  class="ml-2 inline-flex items-center px-3 py-1.5 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                    __('Request Deletion') }}</button>
                </div>
            </div>
            @empty
              <div class="col-span-1 md:col-span-2 text-center py-8">
                <p class="text-gray-500 text-sm">{{ __('No clubs available.') }}</p>
              </div>
            @endforelse
          </div>

          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Club Announcements') }}</h3>

          <div class="mb-4">
            <a href="{{ route('create') }}"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Create New Announcement') }}
            </a>
            <p class="text-gray-500 text-xs mt-1">{{ __('New announcements may require faculty approval before being
              posted.') }}</p>
          </div>

          <ul class="space-y-4">
            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h5 class="font-semibold text-gray-700">{{ __('Upcoming Python Workshop') }}</h5>
              <p class="text-gray-500 text-sm">{{ __('Status:') }} <span class="text-green-500">{{ __('Approved')
                  }}</span></p>
              <p class="text-gray-600 text-sm mt-1">{{ __('Join us for an introductory Python workshop on April 15th at
                3 PM in IT Lab 201.') }}</p>
              <div class="mt-2">
                <a href="#"
                  class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Edit') }}</a>
                <button
                  class="ml-2 inline-flex items-center px-3 py-1.5 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Delete') }}</button>
              </div>
            </li>

            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h5 class="font-semibold text-gray-700">{{ __('Project Showcase Reminder') }}</h5>
              <p class="text-gray-500 text-sm">{{ __('Status:') }} <span class="text-yellow-500">{{ __('Pending
                  Approval') }}</span></p>
              <p class="text-gray-600 text-sm mt-1">{{ __('A friendly reminder that the deadline for project submissions
                for the semester showcase is this Friday.') }}</p>
              <div class="mt-2">
                <a href="#"
                  class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Edit') }}</a>
                <button
                  class="ml-2 inline-flex items-center px-3 py-1.5 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Delete') }}</button>
              </div>
            </li>

            <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h5 class="font-semibold text-gray-700">{{ __('Meeting Next Week') }}</h5>
              <p class="text-gray-500 text-sm">{{ __('Status:') }} <span class="text-green-500">{{ __('Approved')
                  }}</span></p>
              <p class="text-gray-600 text-sm mt-1">{{ __('Our next general meeting will be held on Wednesday next week
                at 4 PM in the student lounge.') }}</p>
              <div class="mt-2">
                <a href="#"
                  class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Edit') }}</a>
                <button
                  class="ml-2 inline-flex items-center px-3 py-1.5 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Delete') }}</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>