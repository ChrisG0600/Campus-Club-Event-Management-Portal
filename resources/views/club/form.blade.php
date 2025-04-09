<x-app-layout>
  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-8 bg-white border-b border-gray-200">
          <h2 class="font-semibold text-xl text-gray-800 mb-6">{{ __('Create New Club') }}</h2>
          <form class="space-y-8">
            <div>
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Club Name') }}</label>
              <input type="text" id="name" name="name"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter club name') }}">
            </div>

            <div>
              <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Description')
                }}</label>
              <textarea id="description" name="description" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Describe your club and its mission') }}"></textarea>
            </div>

            <div>
              <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Club Logo (Optional)')
                }}</label>
              <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                      d="M18.685 19.089A9 9 0 0112 21.5a9 9 0 01-6.685-2.411m13.37 0c.081-.018.269-.018.35 0l1.319 1.757c.39.52.298 1.207-.287 1.6-.585.393-1.272.485-1.662.194L12 23.057l-1.318-1.664c-.39-.52-.298-1.207.287-1.6.585-.393 1.272-.485 1.662-.194l1.319 1.757c.081.018.269.018.35 0zM12 18a3 3 0 100-6 3 3 0 000 6z"
                      clip-rule="evenodd" />
                  </svg>
                </span>
                <div class="ml-4 flex-1">
                  <label for="logo-upload"
                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>{{ __('Upload a logo') }}</span>
                    <input id="logo-upload" name="logo" type="file" class="sr-only">
                  </label>
                  <p class="text-gray-500 text-xs mt-1">{{ __('Recommended size: 200x200 pixels. Accepted formats: PNG,
                    JPG.') }}</p>
                </div>
              </div>
            </div>

            <div>
              <label for="contact_info" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contact Information')
                }}</label>
              <textarea id="contact_info" name="contact_info" rows="3"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Provide email, social media links, or other contact details') }}"></textarea>
              <p class="text-gray-500 text-xs mt-1">{{ __('How can interested students get in touch with your club?') }}
              </p>
            </div>

            <div>
              <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Category') }}</label>
              <select id="category_id" name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">{{ __('Select a category') }}</option>
                <option value="technology">{{ __('Technology') }}</option>
                <option value="arts">{{ __('Arts & Culture') }}</option>
                <option value="sports">{{ __('Sports & Recreation') }}</option>
                <option value="social">{{ __('Social & Community') }}</option>
                {{-- Add more categories dynamically here --}}
              </select>
            </div>

            <div class="flex items-center justify-end">
              <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Create Club') }}
              </button>
              <a href="{{ route('club_admin.dashboard') }}"
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