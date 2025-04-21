<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Discover New Clubs') }}</h3>
          <p class="text-gray-500 text-sm mb-2">{{ __('Explore clubs based on your interests.') }}</p>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @forelse ( $categories as $category )
              <a href="{{ route('student.clublist', ['id' => $category->id]) }}" class="border rounded-md p-3 text-center hover:shadow-md transition duration-200">
                <span class="text-sm text-indigo-600 font-semibold">{{ $category->title }}</span>
              </a>
            @empty
              <h5>No  Category</h5>
            @endforelse
          </div>
          {{-- <a href="#" class="block mt-4 text-indigo-500 hover:underline text-sm">{{ __('Browse All Clubs') }}</a> --}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>