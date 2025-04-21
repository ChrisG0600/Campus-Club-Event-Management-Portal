<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Campus Announcements') }}
      </h2>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Latest Announcements') }}</h3>
          <ul class="space-y-4">
            @forelse ( $clubAnnouncements as $clubAnnouncement)
              <li class="py-2 border-b border-gray-200">
                <div class="flex justify-between items-start">
                  <div>
                    <h4 class="font-semibold text-green-700">
                      <a href="#">{{ $clubAnnouncement->title }}</a>
                    </h4>
                    <p class="text-gray-500 text-sm">
                      {{ __('Posted by:') }} {{ $clubAnnouncement->club?->club_name ?? 'Unknown Club' }} |
                      {{ __('Date:') }} {{ date('M d, Y', strtotime($clubAnnouncement->announcement_date)) }}
                    </p>
                    <p class="text-gray-600 text-sm mt-1">{{ $clubAnnouncement->content }}</p>
                  </div>
                  <span class="inline-block bg-green-100 text-green-700 rounded-full px-2 py-1 text-xs font-semibold ml-4">{{  __('Club') }}</span>
                </div>
              </li>
            @empty
            <li class="py-2 border-b border-gray-200">
              <div class="flex justify-between items-start">
                <h5>No Club Announcements</h5>
              </div>
            </li>              
            @endforelse            
          </ul>
          <div id="pagination-links" class="mt-2 p-6">
            {{ $clubAnnouncements->links('pagination::tailwind') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>