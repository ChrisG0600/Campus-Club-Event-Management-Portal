<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-6  bg-white overflow-hidden shadow sm:rounded-md mb-6">
        <div class="flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Club Registration') }}
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
      </div>

      <div class="bg-white overflow-hidden shadow sm:rounded-md">
        <div class="p-6">
          <p class="mb-4 text-gray-600">{{ __('Review the following applications for club registration.') }}</p>
          <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 bg-white">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Club Name') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Applicant Name') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Club Email') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Applied On') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
              @forelse ( $clubRegistration as $clubPending )
                <tr class="bg-white border-b hover:bg-gray-50">
                  <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $clubPending->club_name }}
                  </th>
                  <td class="py-4 px-6">
                    {{ $clubPending->creator->name }}
                  </td>
                  <td class="py-4 px-6">
                    {{ $clubPending->club_email }}
                  </td>
                  <td class="py-4 px-6">
                    {{ $clubPending->created_at->format('F j, Y') }}
                  </td>
                  <td class="py-4 px-6 flex space-x-2">
                    <button type="submit" data-id= {{$clubPending->id}}
                      class="btn-approve-club inline-flex items-center rounded-md bg-green-50 px-2.5 py-1.5 text-xs font-medium text-green-700 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                      {{ __('Approve') }}
                    </button>
                    <a href="#"
                      class="inline-flex items-center rounded-md bg-red-50 px-2.5 py-1.5 text-xs font-medium text-red-700 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                      {{ __('Reject') }}
                    </a>
                    <button type="button" data-modal-target="view-details-modal" data-modal-toggle="view-details-modal"
                      data-id="{{ $clubPending->id }}" data-club-name="{{ $clubPending->club_name }}"
                      data-creator-name="{{ $clubPending->creator->name }}" data-email="{{ $clubPending->club_email }}"
                      data-description="{{ $clubPending->club_description }}" data-activities="{{ $clubPending->activities }}"
                      data-why-join-us="{{ $clubPending->why_join }}" data-club-advisor="{{ $clubPending->club_advisor }}"
                      data-category="{{ $clubPending->category->title }}"
                      class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                      {{ __('View') }}
                    </button>
                  </td>
                </tr>
              @empty
                <tr class="bg-white border-b hover:bg-gray-50">
                  <td colspan="5" class="py-4 px-6 text-center text-gray-500">
                    {{ __('No pending club registrations found.') }}
                  </td>
                </tr>
              @endforelse                  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="view-details-modal" tabindex="-1" data-modal-backdrop="static"
      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-lg font-semibold text-gray-900">
              {{ __('Club Application Details') }}
            </h3>
            <button type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
              data-modal-hide="view-details-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">{{ __('Close modal') }}</span>
            </button>
          </div>
          <div class="p-4 md:p-5 grid grid-cols-1 gap-4">
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Club Category') }}</span>
              <span class="block text-base text-gray-800" id="modal-club-category"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Club Name') }}</span>
              <span class="block text-base text-gray-800" id="modal-club-name"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Club Creator') }}</span>
              <span class="block text-base text-gray-800" id="modal-creator-name"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Club Email') }}</span>
              <span class="block text-base text-gray-800" id="modal-club-email"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Club Advisor') }}</span>
              <span class="block text-base text-gray-800" id="modal-club-advisor"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Description') }}</span>
              <span class="block text-base text-gray-800" id="modal-description"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Why Join Us') }}</span>
              <span class="block text-base text-gray-800" id="modal-why-join-us"></span>
            </div>
            <div class="bg-gray-50 rounded-md p-3">
              <span class="block text-sm font-medium text-gray-700">{{ __('Proposed Activities') }}</span>
              <span class="block text-base text-gray-800" id="modal-activities"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>