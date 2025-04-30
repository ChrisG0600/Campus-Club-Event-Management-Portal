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
              <div class="flex items-center justify-between">
                <h4 class="font-semibold text-indigo-700">{{ __('Club Name: ')}}{{ $club->club_name}}</h4>
                @if($club->is_pending == 1)
                  <span class="bg-sky-100 text-sky-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">Under Review</span>
                @else
                  <span class="bg-blue-100 text-blue-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">Approved</span>
                @endif
              </div>
              <p class="text-gray-600 text-sm mb-2">{{ __('Club President:') }} {{ $club->creator->name}}</p>
              <a href="{{ route('club_admin.edit', $club->id) }}"
                  class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                  __('Edit Club') }}
              </a>
              <button class="ml-2 inline-flex items-center px-3 py-1.5 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                __('Request Deletion') }}
              </button>
              <div class="mt-2">
                  @php
                  $filledFields = collect([
                  $club->club_name,
                  $club->club_email,
                  $club->club_description,
                  $club->club_advisor,
                  $club->category_id,
                  $club->activities,
                  $club->why_join,
                  $club->club_logo,
                  ])->filter(fn($val) => !is_null($val) && trim($val) !== '');

                  $completion = round(($filledFields->count() / 8) * 100);
                  @endphp

                <div class="mt-2">
                  <p class="text-sm text-gray-600 mb-1">Club Profile Completion: <strong>{{ $completion }}%</strong></p>
                  <div class="w-full bg-gray-200 rounded-full h-2">
                    <div
                      class="h-2 rounded-full transition-all duration-300 ease-in-out {{ $completion < 60 ? 'bg-red-400' : ($completion < 90 ? 'bg-yellow-400' : 'bg-green-500') }}"
                      style="width: {{ $completion }}%">
                    </div>
                  </div>
                  @if ($completion < 90)
                    <p class="text-xs text-gray-600 mt-1">Make the <strong>{{ $club->club_name }}</strong> Club stand out to students.</p>
                  @endif
                </div>
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
            <a href="{{ route('club_admin.announcement.create') }}"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Create New Announcement') }}
            </a>
            <p class="text-gray-500 text-xs mt-1">{{ __('New announcements may require faculty approval before being posted.') }}</p>
          </div>

          <ul class="space-y-4">
            @forelse ( $announcements as $announcement)
              <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
                <h5 class="font-semibold text-gray-700">{{ $announcement->title }}</h5>
                <p class="text-gray-500 text-sm">{{ __('Status:') }} 
                  @if ($announcement->status == 'pending')
                    <span class="text-yellow-500">{{ __('Pending') }}</span>
                  @elseif($announcement->status == 'published')
                    <span class="text-green-500">{{ __('Published') }}</span>
                  @else
                    <span class="text-red-500">{{ __('Rejected') }}</span>
                  @endif
                </p>
                <p class="text-gray-600 text-sm mt-1">{{ $announcement->content }}</p>
                <div class="mt-2">
                  <a href="{{ route('club_admin.announcement.edit', $announcement->id) }}"
                    class="{{$announcement->status == 'published' || $announcement->status == 'rejected' ? 'hidden' : '' }} inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                      {{ __('Edit') }}
                  </a>
                  @if ($announcement->status == 'published')
                    <button data-modal-target="view-announcement-modal" data-modal-toggle="view-announcement-modal"
                      data-id="{{ $announcement->id }}" data-title="{{ $announcement->title }}" data-content="{{ $announcement->content }}"
                      data-created-by="{{ $announcement->creator->name }}" data-club-name="{{ $announcement->club->club_name }}"
                      data-submitted-on="{{ $announcement->created_at->format('M d, Y') }}" 
                      class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md font-semibold text-xs
                      text-white uppercase tracking-widest focus:outline-none focus:ring
                      disabled:opacity-25 transition ease-in-out duration-150 bg-green-500 hover:bg-green-700 focus:ring-green-300">
                      {{  __('View') }}
                    </button>
                  @elseif ($announcement->status == 'rejected')
                    <button data-modal-target="view-announcement-rejected" data-modal-toggle="view-announcement-rejected"
                      data-id="{{ $announcement->id }}" data-title="{{ $announcement->title }}" data-content="{{ $announcement->content }}"
                      data-created-by="{{ $announcement->creator->name }}" data-club-name="{{ $announcement->club->club_name }}"
                      data-submitted-on="{{ $announcement->created_at->format('M d, Y') }}" data-rejection-reason="{{ $announcement->rejection_reason }}"
                      class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring
                        disabled:opacity-25 transition ease-in-out duration-150 bg-red-500 hover:bg-red-700 focus:ring-red-300">
                      {{ __('View Message') }}
                    </button>
                  @endif
                </div>
              </li>
            @empty
              <h5 class="text-gray-500 text-sm text-center">{{ __('No Announcements Available') }}</h5>
            @endforelse
          </ul>
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
        <div class="p-6 space-y-1">
          <input type="hidden" name="announcement-id" id="announcement-id" value="">
          <div>
            <label for="announcement-title" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Title') }}</label>
            <input type="text" id="announcement-title"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="announcement-content" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Content') }}</label>
            <textarea id="announcement-content" rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              readonly></textarea>
          </div>
          <div>
            <label for="announcement-created-by" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Admin') }}</label>
            <input type="text" id="announcement-created-by"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="announcement-club-name" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Name') }}</label>
            <input type="text" id="announcement-club-name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="announcement-submitted-on" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Submitted On')}}</label>
            <input type="text" id="announcement-submitted-on"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="view-announcement-rejected" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Rejected Announcement Details') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="view-announcement-rejected">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-1">
          <input type="hidden" name="rejected-announcement-id" id="rejected-announcement-id" value="">
          <div>
            <label for="rejected-announcement" class="block mb-2 text-sm font-medium text-red-700">{{ __('Reason') }}</label>
            <span type="text" id="rejected-announcement" class="bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg  block w-full p-2.5"></span>
          </div>

          <div>
            <label for="rejected-announcement-title" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Title') }}</label>
            <input type="text" id="rejected-announcement-title"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="rejected-announcement-content" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Content') }}</label>
            <textarea id="rejected-announcement-content" rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
              readonly></textarea>
          </div>
          <div>
            <label for="rejected-announcement-created-by" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Admin') }}</label>
            <input type="text" id="rejected-announcement-created-by"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="rejected-announcement-club-name" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Club Name') }}</label>
            <input type="text" id="rejected-announcement-club-name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
          <div>
            <label for="rejected-announcement-submitted-on" class="block mb-2 text-sm font-medium text-gray-700">{{ __('Submitted On')}}</label>
            <input type="text" id="rejected-announcement-submitted-on"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
              readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>