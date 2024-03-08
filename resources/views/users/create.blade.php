<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="/register" class="mt-10">
                @csrf

                <x-field label="Name" name="name" type="text" :required="true" :old="true" />
                <x-field label="Username" name="username" type="text" :required="true" :old="true" />
                <x-field label="Email" name="email" type="email" :required="true" :old="true" />
                <x-field label="Password" name="password" type="password" :required="true" />
                <x-field label="Confirm Password" name="password_confirmation" type="password" :required="true" />

                <div>
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
