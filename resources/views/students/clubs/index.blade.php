<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Discover New Clubs') }}</h3>
          <p class="text-gray-500 text-sm mb-2">{{ __('Explore clubs based on your interests.') }}</p>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/abcdef/ffffff/?Text=Art" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-indigo-600 font-semibold">{{ __('Art Clubs') }}</span>
            </a>
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/fedcba/ffffff/?Text=Tech" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-green-600 font-semibold">{{ __('Tech Clubs') }}</span>
            </a>
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/aabbcc/ffffff/?Text=Sports" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-blue-600 font-semibold">{{ __('Sports Clubs') }}</span>
            </a>
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/ddeeff/ffffff/?Text=Social" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-yellow-600 font-semibold">{{ __('Social Clubs') }}</span>
            </a>
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/ffaaaa/ffffff/?Text=Music" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-pink-600 font-semibold">{{ __('Music Clubs') }}</span>
            </a>
            <a href="#" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
              <img src="https://via.placeholder.com/50x50/ccffcc/000000/?Text=Drama" alt="Club Category"
                class="mx-auto mb-2 rounded-full">
              <span class="text-sm text-lime-600 font-semibold">{{ __('Drama Clubs') }}</span>
            </a>
            {{-- Add more categories here --}}
          </div>
          <a href="#" class="block mt-4 text-indigo-500 hover:underline text-sm">{{ __('Browse All Clubs') }}</a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>