<x-layout>
    <x-slot name="content">
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <form method="POST" action="/register" class="mt-10">
                @csrf
                
                <x-form.input name="name" required />
                <x-form.input name="username" required />
                <x-form.input name="email" type="email" required />
                <x-form.input name="password" type="password" autocomplete="new-password" required />
                <x-form.button>Sign Up</x-form.button>
            </form>
        </main>
    </section>
    </x-slot>
</x-layout>