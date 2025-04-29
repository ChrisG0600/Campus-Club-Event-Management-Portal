<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
        <div class="flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Details') }}
          </h2>
          <a href="{{ route('club_admin.showApplicant')}}"
            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-200 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 active:bg-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Back to Applicants') }}
          </a>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Personal Information') }}</h3>
            <div class="mb-4">
              <p class="text-gray-600"><span class="font-medium">{{ __('Name:') }}</span> {{ $applicant->student->name}}</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Email:') }}</span> {{ $applicant->student->email}}</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Student Number:') }}</span> {{ $applicant->student_number}}</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Applied On:') }}</span> {{ $applicant->created_at->format('M d, Y')}}</p>
            </div>
          </div>

          <div>
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Application Details') }}</h3>
            <div class="mb-4">
              <p class="text-gray-600"><span class="font-medium">{{ __('Reason for Joining:') }}</span> {{ $applicant->why_interested}}</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Relevant Experience:') }}</span> {{ $applicant->experience ??  __('Not Provided')}}</p>
            </div>
          </div>
          @if ($applicant->reject_message != null && $applicant->status == 'rejected')
            <div class="bg-gray-50 rounded-md p-4">
              <div class="flex items-center justify-between">
              <h3 class="font-semibold text-lg text-red-700 mb-2">{{ __('Rejected') }}</h3>
              @if ($applicant->resubmission_count >=3)
                <p class="font-semibold text-xs text-red-700 mb-2">{{ __('Max Resubmission count reached. Applicant cannot join.') }}</p> 
              @else
                <p class="font-semibold text-sm text-red-700 mb-2">{{ __('Resubmission Count: ') }} <span class="text-red-600">{{ $applicant->resubmission_count}}</span> </p>
              @endif
              </div>
              <p class="font-medium">{{ __('Reason:') }} <span class="text-red-600">{{ $applicant->reject_message}}</span></p>
            </div>
          @endif
        </div>

        @if ($applicant->status == 'declined' || $applicant->status == 'withdrawn')
          <div class="bg-gray-50 rounded-md p-4 mt-6">
            <h3 class="font-semibold text-lg text-red-700 mb-2">{{ $applicant->status === 'declined' ? __('Declined') : ($applicant->status === 'withdrawn' ? __('Withdrawn') : $applicant->status) }}</h3>
            <p class="font-medium">{{ __('Reason:') }} <span class="text-red-600">{{ $applicant->decline_reason ?? $applicant->withdrawn_reason ?? __('Not Provided')}}</span></p>
          </div>
        @else
          <div class="mt-6 flex justify-end space-x-2">
            <button type="submit" data-id="{{ $applicant->id}}"
              class="btn-approve-applicant inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-green-600 focus:outline-none focus:border-green-600 focus:ring focus:ring-green-300 active:bg-green-700 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Approve') }}
            </button>
            <button data-modal-target="rejected_message_modal" data-modal-toggle="rejected_message_modal"
              class="inline-flex items-center rounded-md bg-red-100 px-2.5 py-1.5 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500">
              {{ __('Reject') }}
            </button>
            @if ($applicant->status == 'pending')
            <button data-modal-target="decline_message_modal" data-modal-toggle="decline_message_modal"
              class="inline-flex items-center rounded-md bg-red-400 px-2.5 py-1.5 text-xs font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">
              {{ __('Decline') }}
            </button>
            @endif
          </div>
        @endif
      </div>

    </div>
  </div>
  {{-- Reject Modal --}}
  <div id="rejected_message_modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Reject Applicant') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="rejected_message_modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-4">
          <div>
            <label for="reject_message" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Message') }}</label>
            <textarea id="reject_message" name="reject_message" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="{{ __('Please provide the reason for rejecting this applicant.') }}" required></textarea>
          </div>
          <button type="submit" data-id="{{ $applicant->id}}"
            class="btn-reject-applicant inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-600 focus:outline-none focus:border-red-600 focus:ring focus:ring-red-300 active:bg-red-700 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Re-Apply') }}
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Declined Modal --}}
  <div id="decline_message_modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
          <h3 class="text-xl font-semibold text-gray-900">
            {{ __('Decline Applicant') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="decline_message_modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <div class="p-6 space-y-4">
          <div>
            <label for="decline_reason" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Message') }}</label>
            <textarea id="decline_reason" name="decline_reason" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              placeholder="{{ __('Please provide the reason for declining this applicant.') }}" required></textarea>
          </div>
          <button type="submit" data-id="{{ $applicant->id}}"
            class="btn-decline-applicant inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-600 focus:outline-none focus:border-red-600 focus:ring focus:ring-red-300 active:bg-red-700 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Declined') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>