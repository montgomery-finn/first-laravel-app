<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
       
        @if ($posts->count())
            <x-posts-grid :posts="$posts" class="absolute pointer-events-none"/>
        
            {{ $posts->links() }}
        @endif
    </main>
</x-layout>
    