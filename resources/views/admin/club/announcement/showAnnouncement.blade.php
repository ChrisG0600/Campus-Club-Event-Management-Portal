<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
          <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Pending Announcements') }}
            </h2>
            <a href="{{ route('super_admin.showClubs') }}"
              class="inline-flex items-center rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
              {{ __('Back to Club Management') }}
            </a>
          </div>
        </div>
        <div class="p-6 text-gray-900">
          <p class="mb-4">{{ __('Review the following announcements before publishing.') }}</p>
          <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 bg-white">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Title') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Submitted On') }}
                  </th>
                  <th scope="col" class="py-3 px-6">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @forelse ( $pendingAnnouncements as $pending )
                  <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                      {{ $pending->title }}
                    </td>
                    <td class="py-4 px-6">
                      {{ $pending->created_at->format('M d, Y') }}
                    </td>
                    <td class="py-4 px-6 flex space-x-2">
                      <button data-modal-target="view-announcement-modal" data-modal-toggle="view-announcement-modal"
                        data-id="{{ $pending->id }}" data-title="{{ $pending->title }}" data-content="{{ $pending->content }}"
                        data-created-by="{{ $pending->creator->name }}" data-club-name="{{ $pending->club->club_name }}"
                        data-submitted-on="{{ $pending->created_at->format('M d, Y') }}" 
                        class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('View') }}
                      </button>
                      <button data-id="{{ $pending->id }}" class="btn-announcement-approve inline-flex items-center rounded-md bg-green-400 px-2.5 py-1.5 text-xs font-medium text-gray-700 hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Publish
                      </button>
                      <button data-id="{{ $pending->id }}" data-modal-target="reject-announcement-modal" data-modal-toggle="reject-announcement-modal" class="inline-flex items-center rounded-md bg-red-400 px-2.5 py-1.5 text-xs font-medium text-gray-800 hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Reject
                      </button>
                    </td>
                  </tr>                  
                @empty
                  <tr class="bg-white border-b hover:bg-gray-50">
                    <td colspan="3" class="py-4 px-6 text-center text-gray-500">
                      {{ __('No pending announcements found.') }}
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="view-announcement-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Announcement Details') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="view-announcement-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-4">
          <input type="hidden" name="announcement-id" id="announcement-id" value="">
          <div>
            <label for="announcement-title" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Title') }}</label>
            <input type="text" id="announcement-title"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
          </div>
          <div>
            <label for="announcement-content" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Content') }}</label>
            <textarea id="announcement-content" rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              readonly></textarea>
          </div>
          <div>
            <label for="announcement-created-by" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Admin')
              }}</label>
            <input type="text" id="announcement-created-by"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
          </div>
          <div>
            <label for="announcement-club-name" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Name')
              }}</label>
            <input type="text" id="announcement-club-name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
          </div>
          <div>
            <label for="announcement-submitted-on" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Submitted On')
              }}</label>
            <input type="text" id="announcement-submitted-on"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- Declined Modal --}}
  <div id="reject-announcement-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Decline Applicant') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="reject-announcement-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-4">
          <input type="hidden" name="announcement-id" id="announcement-id">
          <div>
            <label for="rejection_reason" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Message') }}</label>
            <textarea id="rejection_reason" name="rejection_reason" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="{{ __('Please provide the reason for rejecting this announcement.') }}" required></textarea>
          </div>
          <button type="submit"
            class="btn-reject-announcement inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-600 focus:outline-none focus:border-red-600 focus:ring focus:ring-red-300 active:bg-red-700 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Reject') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>