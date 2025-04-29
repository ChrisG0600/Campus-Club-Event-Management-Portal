<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-[250px_1fr] gap-6">

        {{-- Sidebar: Discover New Clubs (Dynamic) --}}
        <aside class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white">
            <h4 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Discover Clubs') }}</h4>
            <p class="text-gray-500 text-sm mb-2">{{ __('Explore by category:') }}</p>
            <nav>
              @forelse ($categories as $category)
              <a href="{{ route('student.clublist', ['id' => $category->id]) }}"
                class="block py-2 px-4 text-gray-700 hover:bg-gray-100 hover:text-indigo-600 rounded-md transition duration-200">
                {{ $category->title }}
              </a>
              @empty
              <p class="text-gray-500">{{ __('No Categories') }}</p>
              @endforelse
            </nav>
          </div>
        </aside>

        {{-- Main Content: Your Club Applications (Static) --}}
        <main class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Your Club Applications') }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ __('Status of your applications.') }}</p>
            <ul class="space-y-3">
              @forelse ( $hasApplied as $clubapplied )
              <li class="flex items-center justify-between py-2 border-b border-gray-200">
                <div class="flex items-center">
                  <h5 class="text-gray-600 font-medium">{{ $clubapplied->club->club_name}}</h5>
                  @if ($clubapplied->status == 'pending')
                    <span
                      class="inline-flex items-center ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                      {{ __('Pending') }}
                    </span>
                  @elseif ($clubapplied->status == 'rejected')
                    <span
                      class="inline-flex items-center ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                      {{ __('Rejected') }}
                    </span>
                  @elseif ($clubapplied->status == 'declined')
                    <span
                      class="inline-flex items-center ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                      {{ __('Declined') }}
                    </span>
                  @elseif ($clubapplied->status == 'withdrawn')
                    <span
                      class="inline-flex items-center ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 text-gray-500">
                      {{ __('Application Withdrawn') }}
                    </span>
                  @else
                    <a href="#"
                      class="inline-flex items-center ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                      {{ __('Accepted') }}
                    </a>
                  @endif
                </div>
                @if ($clubapplied->status == 'pending')
                  <button type="button" data-modal-target="withdraw-application-modal"
                    data-modal-toggle="withdraw-application-modal" data-applicant-id="{{ $clubapplied->id}}"
                    class="text-yellow-500 text-sm hover:underline ml-auto">
                    {{ __('Withdraw Application')}}
                  </button>
                @elseif ($clubapplied->status == 'rejected')
                  <button type="button" class="text-red-500 text-sm hover:underline ml-auto"
                    data-modal-target="rejected-message-modal" data-modal-toggle="rejected-message-modal"
                    data-applicant-id="{{ $clubapplied->id}}" data-student-number="{{ $clubapplied->student_number }}"
                    data-why-interested="{{ $clubapplied->why_interested}}" data-experience="{{ $clubapplied->experience}}"
                    data-reject-message="{{ $clubapplied->reject_message}}"
                    data-resubmit-count="{{ $clubapplied->resubmission_count }}">
                    {{ __('Check the Rejected Message')}}</button>
                @else
                {{-- No action needed for accepted applications --}}
                @endif
              </li>
              @empty
                <h5 class="text-gray-600 italic">{{ __('You haven\'t applied to any clubs yet.') }}</h5>
              @endforelse
            </ul>
          </div>
        </main>
      </div>
    </div>
  </div>
  {{-- Check Rejected Message Modal --}}
  <div id="rejected-message-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
    <div class="relative w-full h-full max-w-4xl md:h-auto">
      <div class="relative bg-white rounded-lg shadow md:grid md:grid-cols-2 md:h-auto">
        <form action="{{ route('student.club.reapply') }}" method="POST" class="p-6 rounded-l-lg" id="re-apply-form">
          @csrf
          @method('PUT')
          <input type="hidden" name="applicant_id" id="applicant_id">
          <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">
              {{ __('Re-Apply to Club') }}
            </h3>
            <p class="text-gray-500 text-sm mb-4">
              {{ __('Please review and update your application details.') }}
            </p>
            <label for="student_number" class="block text-gray-700 text-sm font-bold mb-2">
              {{ __('Student Number') }}
            </label>
            <input type="text" name="student_number" id="student_number"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          </div>

          <div class="mb-4">
            <label for="why_interested" class="block text-gray-700 text-sm font-bold mb-2">
              {{ __('Why are you interested in joining?') }}
            </label>
            <textarea name="why_interested" id="why_interested" rows="4"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="Explain your motivation or what interests you about this club"
              required></textarea>
          </div>

          <div class="mb-4">
            <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">
              {{ __('Relevant Experience (Optional)') }}
            </label>
            <textarea name="experience" id="experience" rows="4"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="Mention any experience related to the club's activities (if any)"></textarea>
          </div>

          <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
            {{ __('Re-Apply') }}
          </button>
        </form>

        <div class="bg-gray-100 p-6 rounded-r-lg md:rounded-r-lg">
          <div class="flex items-start justify-between mb-4">
            <h3 class="text-xl font-semibold text-gray-900 ">
              {{ __('Rejection Details') }}
            </h3>
            <button type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
              data-modal-hide="rejected-message-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">{{ __('Close modal') }}</span>
            </button>
          </div>
          <p class="text-gray-700 text-sm mb-4">
            {{ __('Your application was not approved for the following reason:') }}
          </p>
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Reason:</span>
            <h5 id="rejection-message"></h5>
          </div>
          <p class="text-gray-700 text-sm">
            {{ __('Please update your application with more details and resubmit.') }}
          </p>
        </div>
      </div>
    </div>
  </div>

  {{-- Withdraw Application Modal --}}
  <div id="withdraw-application-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Withdraw Application') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="withdraw-application-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-4">
          <div>
            <input type="hidden" name="applicant_id" id="applicant_id">
            <label for="withdrawn_reason" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Reason') }}</label>
            <textarea id="withdrawn_reason" name="withdrawn_reason" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="{{ __('Please provide the reason for your withdrawal.') }}" required></textarea>
          </div>
          <button type="submit"
              class="btn-withdraw-applicant w-full inline-flex items-center justify-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring focus:ring-yellow-300 active:bg-yellow-700 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Withdraw') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>