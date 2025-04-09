<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h2 class="font-semibold text-2xl text-indigo-700 mb-4">
            {{ __('Computer Science Society') }}
          </h2>

          <img src="https://via.placeholder.com/800x300/4a5568/fff?Text=Computer+Science+Society+Banner"
            alt="{{ __('Computer Science Society Banner') }}" class="rounded-md mb-6 w-full object-cover">

          <h3 class="font-semibold text-xl text-gray-800 mb-4">
            {{ __('Welcome to the Computer Science Society!') }}
          </h3>
          <p class="text-gray-600 mb-6">
            {{ __('We are a vibrant community of students passionate about all things computer science. From coding and
            algorithms to artificial intelligence and cybersecurity, we explore the exciting world of technology
            together through workshops, projects, and collaborative learning.') }}
          </p>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Why Join the Computer Science Society?') }}</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
              <li>{{ __('Expand your knowledge in various areas of computer science beyond the classroom.') }}</li>
              <li>{{ __('Collaborate with fellow students on exciting projects and build your portfolio.') }}</li>
              <li>{{ __('Network with industry professionals through guest speaker events and workshops.') }}</li>
              <li>{{ __('Develop valuable teamwork, problem-solving, and communication skills.') }}</li>
              <li>{{ __('Stay up-to-date with the latest trends and technologies in the ever-evolving tech landscape.')
                }}</li>
              <li>{{ __('Participate in fun social events and become part of a supportive community.') }}</li>
            </ul>
          </div>

          <div class="mb-6">
            <h3 class="font-semibold text-lg text-gray-700 mb-2">{{ __('Our Activities') }}</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
              <li>{{ __('Regular coding workshops and tutorials (Python, Java, Web Development, etc.)') }}</li>
              <li>{{ __('Hands-on project development sessions and hackathons.') }}</li>
              <li>{{ __('Guest speaker seminars and industry talks.') }}</li>
              <li>{{ __('Study groups and peer-to-peer learning sessions.') }}</li>
              <li>{{ __('Social gatherings, game nights, and networking events.') }}</li>
              <li>{{ __('Participation in national and international programming competitions.') }}</li>
            </ul>
          </div>

          <div class="mb-6">
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Join This Club!') }}
            </a>
            <a href="#"
              class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
              {{ __('Back to Technology Clubs') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>