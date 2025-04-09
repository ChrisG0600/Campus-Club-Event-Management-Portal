<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Super Admin Dashboard') }}
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-indigo-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4.354a4 4 0 110 5.692M6 10.334h12m-8-3.21c-3.466 0-6.215 2.824-6.215 6.291a6.292 6.292 0 01-1.215-.835m12.02 0a6.292 6.292 0 01-1.216.836c0-3.467-2.749-6.29-6.214-6.29">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Students') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('Manage and view student accounts.') }}</p>
            <a href="{{ route('super_admin.showStudents') }}"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('View Students') }}
            </a>
            <div class="mt-4">
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Total:') }}</span> 150</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Active:') }}</span> 135</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Inactive:') }}</span> 15</p>
            </div>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10-4h-3m-1-12V10l2-1m-8 5h2m-6-6h2m7 4v8m-7-4h1m-7-4h3m-4-1zm3 1h2">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Clubs') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('Manage and oversee all student clubs.') }}</p>
            <a href="{{ route('super_admin.showClubs') }}"
              class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('View Clubs') }}
            </a>
            <div class="mt-4">
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Total:') }}</span> 30</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Active:') }}</span> 28</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Inactive:') }}</span> 2</p>
            </div>
          </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 text-center">
            <svg class="w-12 h-12 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728a3 3 0 01-4.242-4.242m0 0a3 3 0 01-4.243-4.242m0 0a3 3 0 01-4.242-4.242m0 0a3 3 0 01-4.243-4.242">
              </path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">{{ __('Support Issues') }}</h3>
            <p class="text-gray-500 text-sm mb-4">{{ __('Review and address support requests from students and club
              admins.') }}</p>
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('View Issues') }}
            </a>
            <div class="mt-4">
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Total Open:') }}</span> 12</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Pending:') }}</span> 5</p>
              <p class="text-sm text-gray-600"><span class="font-medium">{{ __('Resolved:') }}</span> 7</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="font-semibold text-lg text-gray-700 mb-4">{{ __('Recent Activities') }}</h3>
          <ul class="divide-y divide-gray-200">
            <li class="py-3">
              <p class="text-gray-600"><span class="font-medium">Student John Doe</span> joined the "Coding Club". <span
                  class="text-sm text-gray-500">5 minutes ago</span></p>
            </li>
            <li class="py-3">
              <p class="text-gray-600"><span class="font-medium">Club Admin Jane Smith</span> approved 2 new members for
                the "Debate Society". <span class="text-sm text-gray-500">15 minutes ago</span></p>
            </li>
            <li class="py-3">
              <p class="text-gray-600"><span class="font-medium">Student Alice Brown</span> submitted a support ticket
                regarding "Club application issue". <span class="text-sm text-gray-500">30 minutes ago</span></p>
            </li>
            <li class="py-3">
              <p class="text-gray-600"><span class="font-medium">Club "Science Explorers"</span> created a new event:
                "Astronomy Night". <span class="text-sm text-gray-500">1 hour ago</span></p>
            </li>
            <li class="py-3">
              <p class="text-gray-600"><span class="font-medium">Super Admin You</span> viewed the details of student
                "Bob Green". <span class="text-sm text-gray-500">2 hours ago</span></p>
            </li>
            <li class="py-3 text-center">
              <a href="#" class="text-indigo-500 hover:underline">{{ __('View All Activities') }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>