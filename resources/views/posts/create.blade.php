<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" name="title" id="title"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                   placeholder="Title"
                                   required>
                        </div>

                        <div class="mb-6">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                            <textarea name="body" id="body"
                                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                      placeholder="What's on your mind?"
                                      required></textarea>
                        </div>
                        <x-primary-button>Create</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
