<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <div class="bg-gray-800 hover:bg-gray-700 text-white text-xs font-bold px-3 rounded pt-1">
                <a href="{{ route('posts.create') }}" class="text-white no-underline">+ NEW POST</a>
            </div>
        </div>
    </x-slot>


    @if (session('success'))
        <div class="mt-4 font-medium text-sm text-green-600 flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mt-4 font-medium text-sm text-red-600 flex justify-center">
            {{ session('error') }}
        </div>  
    @endif

    @foreach ($posts as $post)
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-white flex justify-between bg-gray-800">
                        <div>
                            {{ $post->title }}
                        </div>
                        <a 
                        href="{{ route('posts.edit', $post->id) }}" 
                        class="text-white no-underline bg-gray-800 hover:bg-gray-700 text-xs font-bold px-3 rounded pt-1 border">
                        EDIT
                        </a>
                    </div>
                    <div class="p-6 text-gray-900">
                        {{ $post->body }}
                    </div>
                </div>
            </div>
            
        </div>
    @endforeach

    {{ $posts->links() }}
</x-app-layout>
