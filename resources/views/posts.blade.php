<x-layout>
    <x-slot name="content">
        <div>
            <br><br>
            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</span>
                <form method="POST" action="\logout" class="ml-3 text-xs font-semibold text-blue-500 ml-6">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-3 text-xs font-bold uppercase">Log in</a>
            @endauth
        </div>
        @foreach ($posts as $post)
            <article>

                <h1>
                    <a href = "/posts/{{ $post->slug }}">
                        {{ $post-> title }}
                    </a>
                </h1>
                <p>
                    By <a href = "/authors/{{ $post->author->username }}" > {{ $post->author->name }} </a> in <a href="/categories/{{ $post->category->slug }}"> 
                        {{ $post->category->name }}
                    </a>
                </p>
                <div>
                    {!! $post->excerpt !!}
                </div>

            </article>
        @endforeach
    </x-slot>
</x-layout>