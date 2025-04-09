@php $role = auth()->user()->role; @endphp

@if ($role === 'student')
  <x-nav-link :href="route('student.announcement')"
    :active="request()->routeIs('student.announcement')">
    {{ __('Announcement') }}
  </x-nav-link>
  <x-nav-link :href="route('student.club.index')"
    :active="request()->routeIs('student.club.index')">
    {{ __('Club') }}
  </x-nav-link>
  <x-nav-link :href="route('student.event.index')"
    :active="request()->routeIs('student.event.index')">
    {{ __('Event') }}
  </x-nav-link>
@elseif ($role === 'club_admin')

@elseif ($role === 'super_admin')

@endif