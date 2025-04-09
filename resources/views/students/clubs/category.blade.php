<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Technology Clubs') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">
            {{ __('Clubs in the Technology Category') }}
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-indigo-700">{{ __('Computer Science Society') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('Focuses on programming, algorithms, and software development.') }}
              </p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-green-700">{{ __('Robotics Club') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('Designs, builds, and competes with robots.') }}</p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-blue-700">{{ __('Web Development Guild') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('Dedicated to learning and creating websites and web
                applications.') }}</p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-pink-700">{{ __('AI and Machine Learning Club') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('Exploring the fascinating world of artificial intelligence and
                machine learning.') }}</p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-yellow-700">{{ __('Cyber Security Society') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('Dedicated to promoting awareness and knowledge in cybersecurity.')
                }}</p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            <div class="border rounded-md p-4 hover:shadow-md transition duration-200">
              <h4 class="font-semibold text-teal-700">{{ __('Game Development Club') }}</h4>
              <p class="text-gray-600 text-sm">{{ __('For students interested in all aspects of video game creation.')
                }}</p>
              <a href="#" class="inline-block mt-2 text-indigo-500 hover:underline text-sm">{{ __('View Club') }}</a>
            </div>
            {{-- Add more clubs belonging to the selected category here --}}
          </div>

          <div class="mt-6">
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Back to All Categories') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>