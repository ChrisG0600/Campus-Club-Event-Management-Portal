<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 flex items-center justify-between">
          <h3 class="font-semibold text-xl">
            {{ __('Welcome to the ') . $club->club_name . __(' club!')}}
          </h3>
          <a href="{{ route('student.clublist', ['id' => $club->category->id]) }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Back to Technology  Category') }}
          </a>
        </div>        
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">
            @if ($club->club_logo == null)
              <h5>No Image Available</h5>
            @else
              <img src="{{ asset('images/club_logos/' . $club->club_logo)}}" alt="{{ $club->club_name }}" class="rounded-md w-auto h-auto max-h-44 object-contain">
            @endif
          </div>

          <p class="text-gray-600 mb-6">
            {{ $club->description ?? __('Description Unavailable') }}
          </p>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Why Join the ' . $club->club_name) }}</h3>
            <ul class="list-disc pl-6 text-gray-700 text-sm space-y-1">
              @foreach (explode("\n", $club->why_join) as $line)
                @if (trim($line) !== '')
                  <li>{{ trim($line) }}</li>
                @else
                  <li>{{ __('No reason provided') }}</li>
                @endif
              @endforeach
            </ul>
          </div>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Our Activities') }}</h3>
            <ul class="list-disc pl-6 text-gray-700 text-sm space-y-1">
              @foreach (explode("\n", $club->activities) as $line)
                @if (trim($line) !== '')
                  <li>{{ trim($line) }}</li>
                @endif
              @endforeach
            </ul>
          </div>

          <div class="mb-6 flex items-center justify-start gap-3">
            <button type="button" data-modal-target="join-club-modal" data-modal-toggle="join-club-modal"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Join This Club!') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="join-club-modal" tabindex="-1" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
          <h3 class="text-lg font-semibold text-gray-900">
            {{ __('Club Application Form') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="join-club-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <form action="" method="POST" class="p-6" id="join-club-form">
          @csrf
          <div class="mb-4">
            <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Student ID: ') }}</label>
            <input type="text" name="student_id" id="student_id"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          </div>
          <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
            {{ __('Apply') }}
          </button>
        </form>
      </div>
    </div>
  </div>






</x-app-layout>