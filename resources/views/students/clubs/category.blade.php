<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white mb-6 overflow-hidden shadow-sm sm:rounded-lg border-b-white">
        <div class="p-6 flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __( $category->title . ' category') }}
          </h2>
          <a href="{{ route('student.club.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Back to All Categories') }}
          </a>
        </div>
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">
            {{ __('List of available clubs under ' . $category->title) }}
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ( $category->clubRegistrations as $club )
              @if ($club->is_pending == 0)
                <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
                  <h4 class="font-semibold text-indigo-700">{{ $club->club_name }}</h4>
                  <p class="text-gray-600 text-sm mt-3">{{ $club->description }} {{ __('Description Unavailable')}}</p>
                  </p>
                  <a href="{{ route('student.club.details', ['club' => $club->club_name, 'id' => $club->id]) }}" class="inline-block mt-2 underline hover:no-underline text-sm">
                    {{ __('View Club') }}
                  </a>
                </div>                
              @else
                <p class="text-gray-500 text-sm italic">{{ __('No Club Available') }}</p>
              @endif
            @empty
              <p class="text-gray-500 text-sm italic">{{ __('No Clubs Available in this Category') }}</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>