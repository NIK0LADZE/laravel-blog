<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form method="POST" action="{{ route('login') }}" class="mt-10">
                @csrf

                <x-form.input label="Email" name="email" type="email" required />
                <x-form.input label="Password" name="password" type="password" required />

                <x-form.button type="primary" class="mt-6 text-md font-normal normal-case rounded py-2 px-4">Log In</x-form.button>
            </form>
        </main>
    </section>
</x-layout>
