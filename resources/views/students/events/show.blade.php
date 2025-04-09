<x-app-layout>
  <div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h2 class="font-semibold text-2xl text-indigo-700 mb-4">
            {{ __('Tech Talk: AI for Beginners') }}
          </h2>

          <img src="https://via.placeholder.com/1200x400/4a5568/fff?Text=AI+for+Beginners+Event+Banner"
            alt="{{ __('AI for Beginners Event Banner') }}" class="rounded-md mb-6 w-full object-cover"
            style="max-height: 400px;">

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Description') }}</h3>
            <p class="text-gray-600 mb-4">
              {{ __('Join us for an engaging and informative introductory session to the fascinating world of Artificial
              Intelligence. This talk is specifically designed for students with no prior AI knowledge, providing a
              solid foundation for understanding key concepts and applications.') }}
            </p>
          </div>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Date & Time') }}</h3>
            <p class="text-gray-600">{{ __('Date:') }} {{ __('April 19, 2025') }}</p>
            <p class="text-gray-600">{{ __('Time:') }} {{ __('2:00 PM - 3:30 PM') }} (PHT)</p>
          </div>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Venue') }}</h3>
            <p class="text-gray-600">{{ __('IT Lab 201, University Main Building') }}</p>
          </div>

          {{-- Add other relevant sections here (e.g., registration, speakers) --}}

          <div class="mb-6">
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Attend this event!') }}
            </a>
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Back to Events page') }}
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>