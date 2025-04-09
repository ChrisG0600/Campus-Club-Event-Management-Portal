<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 ml-2">
        {{ __('Applicant Details') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="mb-4">
          <a href="{{ route('club_admin.showApplicant') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring focus:ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Back to Applicants') }}
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Personal Information') }}</h3>
            <div class="mb-4">
              <p class="text-gray-600"><span class="font-medium">{{ __('Name:') }}</span> Alice Brown</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Email:') }}</span> alice.brown@example.com</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Applied On:') }}</span> April 8, 2025</p>
            </div>
          </div>

          <div>
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Application Details') }}</h3>
            <div class="mb-4">
              <p class="text-gray-600"><span class="font-medium">{{ __('Reason for Joining:') }}</span> I am passionate
                about coding and want to collaborate with fellow students on projects.</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Relevant Experience:') }}</span> Completed
                introductory courses in Python and JavaScript.</p>
              <p class="text-gray-600"><span class="font-medium">{{ __('Skills:') }}</span> Python, JavaScript, Git.</p>
            </div>
          </div>
        </div>

        <div class="mt-6 flex justify-end space-x-2">
          <button href="#"
            class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Approve') }}
          </button>
          <button href="#"
            class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Reject') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>