<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="{{ route('register') }}" class="mt-10">
                @csrf

                <x-form.input label="Name" id="name" name="name" type="text" required />
                <x-form.input label="Username" id="username" name="username" type="text" required />
                <x-form.input label="Email" id="email" name="email" type="email" required />
                <x-form.input label="Password" id="password" name="password" type="password" required />
                <x-form.input label="Confirm Password" id="password_confirmation" name="password_confirmation" type="password" required />

                <x-form.button type="primary" class="mt-6 text-md font-normal normal-case rounded py-2 px-4 bg-blue-400">Sign Up</x-form.button>
            </form>
        </main>
    </section>
</x-layout>
