<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Club Admin Dashboard') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="font-semibold text-lg text-gray-700 mb-4">{{ __('Manage Members & Applications') }}</h3>

        <div class="md:grid md:grid-cols-2 md:gap-6">
          <div class="mb-6 md:mb-0">
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Current Members') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-700 bg-white rounded-md">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Joined On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">John Doe</th>
                    <td class="py-3 px-4 text-gray-700">john.doe@example.com</td>
                    <td class="py-3 px-4 text-gray-700">2025-04-01</td>
                    <td class="py-3 px-4">
                      <button
                        class="inline-flex items-center px-2 py-1 bg-red-300 border border-transparent rounded-md font-semibold text-xs text-red-700 uppercase tracking-widest hover:bg-red-400 focus:outline-none focus:ring focus:ring-red-200 disabled:opacity-25 transition ease-in-out duration-150">{{
                        __('Remove') }}</button>
                    </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">Jane Smith</th>
                    <td class="py-3 px-4 text-gray-700">jane.smith@example.com</td>
                    <td class="py-3 px-4 text-gray-700">2025-03-15</td>
                    <td class="py-3 px-4">
                      <button
                        class="inline-flex items-center px-2 py-1 bg-red-300 border border-transparent rounded-md font-semibold text-xs text-red-700 uppercase tracking-widest hover:bg-red-400 focus:outline-none focus:ring focus:ring-red-200 disabled:opacity-25 transition ease-in-out duration-150">{{
                        __('Remove') }}</button>
                    </td>
                  </tr>
                  <tr class="bg-white hover:bg-gray-50 cursor-pointer">
                    <td class="py-3 px-4" colspan="4">{{ __('...') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div>
            <h4 class="font-semibold text-md text-gray-700 mb-2">{{ __('Pending Applicants') }}</h4>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-700 bg-white rounded-md">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100">
                  <tr>
                    <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Applied On') }}</th>
                    <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">Alice Brown</th>
                    <td class="py-3 px-4 text-gray-700">2025-04-08</td>
                    <td class="py-3 px-4">
                      <a href="{{ route('club_admin.show')}}"
                        class="inline-flex items-center px-3 py-2 bg-blue-300 border border-transparent rounded-md font-semibold text-xs text-blue-700 uppercase tracking-widest hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">{{
                        __('View Details') }}</a>
                    </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer">
                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">Bob Green</th>
                    <td class="py-3 px-4 text-gray-700">2025-04-05</td>
                    <td class="py-3 px-4">
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 bg-blue-300 border border-transparent rounded-md font-semibold text-xs text-blue-700 uppercase tracking-widest hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">{{
                        __('View Details') }}</a>
                    </td>
                  </tr>
                  <tr class="bg-white hover:bg-gray-50 cursor-pointer">
                    <td class="py-3 px-4" colspan="3">{{ __('...') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>