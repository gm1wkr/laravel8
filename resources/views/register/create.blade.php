<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl mb-8">Register</h1>
            <form action="/register" method="post"  autocomplete="off">
                @csrf

                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name"
                    >
                        Name
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        id="name" 
                        type="text"
                        name="name"
                        value="{{ old('name')}}"
                        placeholder="Your Name" 
                        {{-- required --}}
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                    >
                        Email
                    </label>

                    <input
                        id="email" 
                        class="border border-gray-400 p-2 w-full"
                        type="email"
                        name="email"
                        value="{{ old('email')}}"
                        placeholder="Your Email" 
                        {{-- required --}}
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
                </div>


                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="username"
                    >
                        Username
                    </label>

                    <input
                        id="username"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="username"
                        value="{{ old('username')}}"
                        placeholder="Username"
                        {{-- required --}}
                    >

                    @error('username')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
                </div>


                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password"
                    >
                        Password
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password"
                        id="password" 
                        placeholder="Password" 
                        {{-- required --}}
                    >

                @error('password')
                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>
                @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>
            </form>

            {{-- @dd($errors) --}}
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </main>
    </section>
</x-layout>