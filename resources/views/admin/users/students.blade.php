<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Registered Users') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
          <a href="{{ route('super_admin.dashboard') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Back to Dashboard') }}
          </a>
          <div>
            <label for="search" class="sr-only">{{ __('Search Users') }}</label>
            <input type="text" id="search"
              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:w-64 text-sm border-gray-300 rounded-md"
              placeholder="{{ __('Search Users...') }}">
          </div>
        </div>

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 bg-white rounded-md">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="py-3 px-4">{{ __('ID') }}</th>
                <th scope="col" class="py-3 px-4">{{ __('Name') }}</th>
                <th scope="col" class="py-3 px-4">{{ __('Email') }}</th>
                <th scope="col" class="py-3 px-4">{{ __('Role') }}</th>
                <th scope="col" class="py-3 px-4">{{ __('Joined On') }}</th>
                <th scope="col" class="py-3 px-4">{{ __('Actions') }}</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b hover:bg-gray-100">
                <td class="py-3 px-4">1</td>
                <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">John Doe</th>
                <td class="py-3 px-4 text-gray-500">john.doe@example.com</td>
                <td class="py-3 px-4 text-gray-500">Student</td>
                <td class="py-3 px-4 text-gray-500">2025-03-15</td>
                <td class="py-3 px-4">
                  <button data-modal-target="editUserModal-1" data-modal-toggle="editUserModal-1"
                    class="font-medium text-blue-600 hover:underline cursor-pointer">{{ __('Edit') }}</button>
                  <span class="text-gray-300 mx-2">|</span>
                  <a href="#" class="font-medium text-red-600 hover:underline">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr class="bg-white border-b hover:bg-gray-100">
                <td class="py-3 px-4">2</td>
                <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">Jane Smith</th>
                <td class="py-3 px-4 text-gray-500">jane.smith@example.com</td>
                <td class="py-3 px-4 text-gray-500">Club Admin</td>
                <td class="py-3 px-4 text-gray-500">2025-03-20</td>
                <td class="py-3 px-4">
                  <button data-modal-target="editUserModal-2" data-modal-toggle="editUserModal-2"
                    class="font-medium text-blue-600 hover:underline cursor-pointer">{{ __('Edit') }}</button>
                  <span class="text-gray-300 mx-2">|</span>
                  <a href="#" class="font-medium text-red-600 hover:underline">{{ __('Delete') }}</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="editUserModal-1" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900">
              {{ __('Edit User') }}
            </h3>
            <button type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
              data-modal-hide="editUserModal-1">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">{{ __('Close modal') }}</span>
            </button>
          </div>
          <div class="p-4 md:p-5">
            <form class="space-y-4">
              <div>
                <label for="edit-name-1" class="block mb-2 text-sm font-medium text-gray-900">{{
                  __('Name') }}</label>
                <input type="text" id="edit-name-1"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                  value="John Doe" readonly>
              </div>
              <div>
                <label for="edit-email-1" class="block mb-2 text-sm font-medium text-gray-900">{{
                  __('Email') }}</label>
                <input type="email" id="edit-email-1"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
                  value="john.doe@example.com" readonly>
              </div>
              <div>
                <label for="edit-role-1" class="block mb-2 text-sm font-medium text-gray-900">{{
                  __('Role') }}</label>
                <select id="edit-role-1"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <option value="student" selected>{{ __('Student') }}</option>
                  <option value="club_admin">{{ __('Club Admin') }}</option>
                </select>
              </div>
              <div>
                <label for="edit-status-1" class="block mb-2 text-sm font-medium text-gray-900">{{
                  __('Account Status') }}</label>
                <select id="edit-status-1"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <option value="active" selected>{{ __('Active') }}</option>
                  <option value="inactive">{{ __('Inactive') }}</option>
                </select>
              </div>
              <div class="flex items-center">
                <button type="button"
                  class="text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                  {{ __('Reset Password') }}
                </button>
                <p class="ms-3 text-sm text-gray-500">{{ __('This will trigger a password reset
                  action for the user.') }}</p>
              </div>
            </form>
          </div>
          <div class="flex items-center justify-end p-4 md:p-5 border-t rounded-b">
            <button data-modal-hide="editUserModal-1" type="button"
              class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 ms-3">
              {{ __('Cancel') }}
            </button>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ms-3">
              {{ __('Save changes') }}
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>

</x-app-layout>