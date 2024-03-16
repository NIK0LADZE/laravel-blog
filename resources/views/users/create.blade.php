<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="{{ route('register') }}" class="mt-10">
                @csrf

                <x-field label="Name" id="name" name="name" type="text" required />
                <x-field label="Username" id="username" name="username" type="text" required />
                <x-field label="Email" id="email" name="email" type="email" required />
                <x-field label="Password" id="password" name="password" type="password" required />
                <x-field label="Confirm Password" id="password_confirmation" name="password_confirmation" type="password" required />

                <div>
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
