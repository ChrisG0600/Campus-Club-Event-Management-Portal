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
            <p class="text-gray-500 text-xs mt-1">{{ __('New announcements may require faculty approval before being
              posted.') }}</p>
          </div>

          <ul class="space-y-4">
            @forelse ( $announcements as $announcement)
              <li class="border rounded-md p-4 hover:shadow-md transition duration-200">
                <h5 class="font-semibold text-gray-700">{{ $announcement->title }}</h5>
                <p class="text-gray-500 text-sm">{{ __('Status:') }} <span class="text-green-500">{{ __('Approved') }}</span></p>
                <p class="text-gray-600 text-sm mt-1">{{ $announcement->content }}</p>
                <div class="mt-2">
                  <a href="{{ route('club_admin.announcement.edit', $announcement->id) }}"
                    class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                    __('Edit') }}
                  </a>
                  <form method="POST" action="{{ route('club_admin.announcement.destroy', ['id' => $announcement->id]) }}"  data-redirect-url="{{ route('club_admin.manage') }}" class="inline" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-name="{{ $announcement->title }}" class="delete-btn ml-2 inline-flex items-center px-3 py-1.5 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">{{
                      __('Delete') }}
                    </button>
                  </form>
                </div>
              </li>
            @empty
              <h5>No Announcment</h5>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>