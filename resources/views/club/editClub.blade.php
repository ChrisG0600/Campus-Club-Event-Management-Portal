<x-app-layout>
  <div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-8">
        {{ __('Edit Club') }}
      </h2>
      @php
        $fields = [
        'Club Name' => $clubs->club_name,
        'Club Email' => $clubs->club_email,
        'Description' => $clubs->club_description,
        'Advisor' => $clubs->club_advisor,
        'Category' => $clubs->category_id,
        'Activities' => $clubs->activities,
        'Why Join' => $clubs->why_join,
        'Logo' => $clubs->club_logo,
        ];

        $missingFields = collect($fields)->filter(fn($val) => is_null($val) || trim($val) === '')->keys();
        $profileCompletion = round(((count($fields) - count($missingFields)) / count($fields)) * 100);
      @endphp

      <div class="mb-6 bg-white shadow-md rounded-lg p-6 space-y-4">
        <h3 class="text-md font-semibold text-gray-800">Club Profile Completion: <span class="text-sm text-gray-600 mt-2">{{ $profileCompletion }}% complete</span></h3>
        <div class="w-full bg-gray-200 rounded-full h-3 mt-2">
          <div class="bg-green-500 h-3 rounded-full transition-all duration-300 ease-in-out"
            style="width: {{ $profileCompletion }}%"></div>
        </div>

        @if ($missingFields->count())
        <p class="text-sm text-red-600 mt-1">Missing: {{ $missingFields->join(', ') }}</p>
        @endif
      </div>
      <form action="{{ route('club_admin.update', ['id' => $clubs->id]) }}" method="POST" enctype="multipart/form-data" id="edit-club-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="club_id" id="edit_club_id" value="{{ $clubs->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Left Panel: Club Info -->
          <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Club Information</h3>

            <div>
              <label for="club_name" class="block text-gray-700 text-sm font-bold mb-2">Club Name</label>
              <input type="text" id="edit_club_name" name="club_name" value="{{ $clubs->club_name }}"
                class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter club name" />
            </div>

            <div>
              <label for="club_email" class="block text-gray-700 text-sm font-bold mb-2">Club Email</label>
              <input type="email" id="edit_club_email" name="club_email" value="{{ $clubs->club_email }}"
                class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter club email" />
            </div>

            <div>
              <label for="club_description" class="block text-gray-700 text-sm font-bold mb-2">Club Description</label>
              <textarea id="edit_club_description" name="club_description"
                class="w-full border-gray-300 rounded-md shadow-sm h-28 resize-y"
                placeholder="Enter club description">{{ $clubs->club_description }}</textarea>
            </div>

            <div>
              <label for="club_advisor" class="block text-gray-700 text-sm font-bold mb-2">Club Advisor</label>
              <input type="text" id="edit_club_advisor" name="club_advisor" value="{{ $clubs->club_advisor }}"
                class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter advisor's name" />
            </div>

            <div>
              <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
              <select id="edit_category_id" name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                @foreach ( $categories as $category )
                <option value="{{ $category->id }}" {{ $clubs->category_id == $category->id ? 'selected' : '' }}>
                  {{ $category->title }}
                </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Right Panel: Extras -->
          <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Extras</h3>

            <div>
              <label for="why_join" class="block text-gray-700 text-sm font-bold mb-2">Why Join This Club?</label>
              <textarea id="edit_why_join" name="why_join"
                class="w-full border-gray-300 rounded-md shadow-sm h-28 resize-y"
                placeholder="Explain why students should join this club">{{ old('why_join', $clubs->why_join) }}</textarea>
            </div>

            <div>
              <label for="club_activities" class="block text-gray-700 text-sm font-bold mb-2">Club Activities</label>
              <textarea id="edit_activities" name="activities"
                class="w-full border-gray-300 rounded-md shadow-sm h-28 resize-y"
                placeholder="List the club's main activities">{{ old('club_activities', $clubs->activities) }}</textarea>
            </div>

            <div>
              <label for="club_logo" class="block text-gray-700 text-sm font-bold mb-2">Upload New Logo</label>
              <input type="file" id="edit_club_logo" name="club_logo"
                class="w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2">Current Logo</label>
              <img src="{{ asset('images/club_logos/' . $clubs->club_logo) }}" alt="Club Logo" class="rounded-full h-24 w-24 object-cover border border-gray-300">
            </div>
            
            <!-- Form Actions -->
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
        
          </div>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>