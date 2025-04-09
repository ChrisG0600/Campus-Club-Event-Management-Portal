<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-8 bg-white border-b border-gray-200">
          <h2 class="font-semibold text-xl text-gray-800 mb-6">{{ __('Create Announcement') }}</h2>
          <form class="space-y-6">
            <div>
              <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
              <input type="text" id="title" name="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter Title') }}" required>
            </div>

            <div>
              <label for="content" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Content') }}</label>
              <textarea id="content" name="content" rows="4"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter Announcement Content') }}" required></textarea>
            </div>

            <div>
              <label for="announcement_date" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Announcement
                Date') }}</label>
              <input type="text" id="announcement_date" name="announcement_date"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Select Announcement Date') }}" required>
            </div>

            <div>
              <label for="time" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Time (Optional)') }}</label>
              <input type="time" id="time" name="time"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              <p class="text-gray-500 text-xs mt-1">{{ __('If applicable.') }}</p>
            </div>

            <div>
              <label for="place" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Place (Optional)') }}</label>
              <input type="text" id="place" name="place"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter Location') }}">
              <p class="text-gray-500 text-xs mt-1">{{ __('If applicable.') }}</p>
            </div>

            <div class="flex items-center justify-end">
              <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Create Announcement') }}
              </button>
              <a href="{{ route('club_admin.manage') }}"
                class="inline-flex items-center ml-4 px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Cancel') }}
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>