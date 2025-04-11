<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="mb-8 p-6 bg-white shadow-md rounded-lg overflow-hidden border-b border-gray-200">
        <div class="flex items-center justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Club Categories') }}
          </h2>
          <a href="{{ route('super_admin.showClubs') }}"
            class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="-ml-1 me-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            {{ __('Back to Club Management') }}
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
          <h3 class="font-semibold text-lg text-gray-800 mb-4">{{ __('Add New Category') }}</h3>
          <form action="{{ route('super_admin.categories.store') }}" method="POST" id="add-category-form">
            @csrf
            <div class="mb-4">
              <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
              <input type="text" name="title" id="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="{{ __('Category Title') }}" required>
            </div>
            <div class="mb-4">
              <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Description
                (Optional)')
                }}</label>
              <textarea name="description" id="description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="{{ __('Category Description') }}"></textarea>
            </div>
            <button type="submit"
              class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
              {{ __('Add') }}
            </button>
          </form>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <h3 class="font-semibold text-lg text-gray-800 p-6 border-b border-gray-200">{{ __('Manage Categories') }}
          </h3>
          <div class="overflow-x-auto p-6">
            <table id="categories-table" class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ __('Title') }}
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ __('Description') }}
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ __('Action') }}
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200" id="categories-table-body">
                @forelse ($categories as $category)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->title }}</td>
                  <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description ?? __('No description') }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex space-x-2 items-center">
                    <button type="button" data-modal-target="edit-category" data-modal-toggle="edit-category"
                      class="text-indigo-600 hover:text-indigo-900" data-category-id="{{ $category->id }}"
                      data-category-title="{{ $category->title }}"
                      data-category-description="{{ $category->description}}">{{ __('Edit') }}</button>
                    <form method="POST"
                      action="{{ route('super_admin.categories.destroy', ['category' => $category]) }}"
                      onsubmit="return confirm('{{ __('Are you sure you want to delete this category?') }}');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="px-6 py-4 text-center text-gray-500">{{ __('No categories found.') }}</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <div id="pagination-links" class="mt-4 p-6">
            {{ $categories->links('pagination::tailwind') }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="edit-category" tabindex="-1" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
          <h3 class="text-lg font-semibold text-gray-900">
            {{ __('Edit Category') }}
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="edit-category">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
          </button>
        </div>
        <form action="{{ route('super_admin.categories.update', ['category' => $category]) }}" method="POST" class="p-6"
          id="edit-category-form">
          @csrf
          @method('PUT')

          <input type="hidden" name="edit_category_id" id="edit_category_id">
          <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Title') }}</label>
            <input type="text" name="title" id="edit_title"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          </div>
          <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Description (Optional)')
              }}</label>
            <textarea name="description" id="edit_description"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="{{ __('Category Description') }}"></textarea>
          </div>
          <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
            {{ __('Edit') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>