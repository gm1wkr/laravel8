<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl mb-8">Register</h1>
                <form action="/register" method="post"  autocomplete="off">
                    @csrf
                    <x-form.input name="name" placeholder="Your Name" required />
                    <x-form.input name="email" type="email" placeholder="Email" required />
                    <x-form.input name="username" placeholder="Username" required />
                    <x-form.input name="password" type="password" required />
                    <x-form.button>Register</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>