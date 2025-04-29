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
              class="{{ $hasApplied ? 'hidden' : 'inline-flex'}} items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150"
              >
              {{ __('Join This Club!') }}
            </button>
            <span class="inline-flex items-center rounded-md font-semibold text-xs uppercase tracking-widest {{ $hasApplied ? 'text-gray-500' : 'hidden'}}">
              <svg class="w-4 h-4 mr-1 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
              {{ __('Pending Application') }}
            </span>
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
        <form action="{{ route('student.club.apply') }}" method="POST" class="p-6" id="join-club-form">
          @csrf
          <input type="hidden" name="club_id" value="{{ $club->id }}">
          <div class="mb-4">
            <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Student Number') }}</label>
            <input type="text" name="student_number" id="student_number"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required>
          </div>

          <div class="mb-4">
            <label for="why_interested" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Why are you interested in
              joining?') }}</label>
            <textarea name="why_interested" id="why_interested" rows="4"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="Explain your motivation or what interests you about this club" required></textarea>
          </div>

          <div class="mb-4">
            <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Relevant Experience (Optional)')
              }}</label>
            <textarea name="experience" id="experience" rows="4"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="Mention any experience related to the club's activities (if any)"></textarea>
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