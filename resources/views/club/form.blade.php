<x-app-layout>
  <div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <form action="{{ route('club_admin.store') }}" method="POST" enctype="multipart/form-data" id="add-club-form">
        @csrf
        <div class="flex flex-col lg:flex-row gap-6">
          <div class="flex-1 bg-white p-8 rounded-lg shadow-sm border border-gray-200 space-y-6">
            <h2 class="font-semibold text-xl text-gray-800 mb-4">{{ __('Create New Club') }}</h2>

            <div>
              <label for="club_name" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Club Name') }} <span class="text-red-700 text-sm">*</span>
              </label>
              <input type="text" id="club_name" name="club_name"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter club name') }}" required>
            </div>

            <div>
              <label for="club_description" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Description') }} <span class="text-red-700 text-sm">*</span>
              </label>
              <textarea id="club_description" name="club_description" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Describe your club and its mission') }}" required></textarea>
            </div>

            <div>
              <label for="club_logo" class="block text-gray-700 text-sm font-bold mb-2">Club Logo</label>
              <input id="club_logo" name="club_logo" type="file"
                class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-500 file:border-0 file:bg-transparent file:text-gray-700 file:text-sm file:font-medium cursor-pointer hover:file:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                accept="image/*">
            </div>

            <div>
              <label for="club_email" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Club Email') }} <span class="text-red-700 text-sm">*</span>
              </label>
              <input type="email" id="club_email" name="club_email"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter club email') }}" required>
            </div>

            <div>
              <label for="club_advisor" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Club Advisory Name') }} <span class="text-red-700 text-sm">*</span>
              </label>
              <input type="text" id="club_advisor" name="club_advisor"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Enter advisor\'s name') }}" required>
            </div>

            <div>
              <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Category') }} <span class="text-red-700 text-sm">*</span>
              </label>
              <select id="category_id" name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
                <option value="">{{ __('Select a category') }}</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
          </div>

          {{-- Right Panel: Why Join & Our Activities --}}
          <div class="lg:w-1/2 flex flex-col gap-6">
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
              <h2 class="font-semibold text-xl text-gray-800 mb-4">{{ __('Club Details and Activities') }}</h2>
              <label for="why_join" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Why Join This Club?') }}
              </label>
              <textarea id="why_join" name="why_join" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('List the benefits or reasons to join this club') }}"></textarea>

              <label for="activities" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Our Activities') }}
              </label>
              <textarea id="activities" name="activities" rows="5"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="{{ __('Briefly describe club events, programs, or regular activities') }}"></textarea>

              <div class="flex items-center justify-end mt-6">
                <button type="submit"
                  class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Create Club') }}
                </button>
                <a href="{{ route('club_admin.dashboard') }}"
                  class="inline-flex items-center ml-4 px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                  {{ __('Cancel') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>