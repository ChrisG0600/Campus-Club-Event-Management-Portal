<x-app-layout>
  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-8">
        {{ __('Edit Club') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-8">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="font-lg leading-6 text-gray-900 mb-4">
            {{ __('Club Information') }}
          </h3>
          <form action="{{ route('club_admin.update', ['id' => $clubs->id])}}" method="POST" id="edit-club-form">
            @csrf
            @method('PUT')
            <div class="space-y-4">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="hidden" name="club_id" id="edit_club_id" value="{{ $clubs->id }}">
                <div>
                  <label for="club_name" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Club Name') }}
                  </label>
                  <input type="text" id="edit_club_name" name="club_name" value="{{ $clubs->club_name }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter club name" />
                </div>
                <div>
                  <label for="club_email" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Club Email') }}
                  </label>
                  <input type="email"   id="edit_club_email" name="club_email" value="{{ $clubs->club_email }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter club email" />
                </div>
              </div>
              <div>
                <label for="club_description" class="block text-gray-700 text-sm font-bold mb-2">
                  {{ __('Club Description') }}
                </label>
                <textarea id="edit_club_description" name="club_description"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32 resize-y"
                  placeholder="Enter club description.">{{ $clubs->club_description }}</textarea>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label for="club_advisor" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Club Advisor') }}
                  </label>
                  <input type="text" id="edit_club_advisor" name="club_advisor" value="{{ $clubs->club_advisor }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter club advisor's name" />
                </div>
                <div>
                  <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Category') }}
                  </label>
                  <select id="edit_category_id" name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ( $categories as $category )
                      <option value="{{ $category->id }}" {{$clubs->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <div class="w-full md:w-1/2">
                  <label for="club_logo" class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Club Logo') }}
                  </label>
                  <input type="file" id="edit_club_logo" name="club_logo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="w-full md:w-1/2">
                  <label class="block text-gray-700 text-sm font-bold mb-2">
                    {{ __('Current Logo') }}
                  </label>
                  <img src="{{asset('images/club_logos/' . $clubs->club_logo)}}" alt="Club Logo"
                    class="rounded-full h-24 w-24 object-cover border border-gray-300">
                </div>
              </div>
            </div>
            <div class="mt-6 flex justify-end gap-2">
              <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Save Changes') }}
              </button>
              <a href="{{ route('club_admin.manage') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Cancel') }}
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>