<x-layout>
    <x-admin.dashboard heading="Manage Posts" class="p-0 border-none">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <form class="flex gap-2 mb-6" action="" method="GET">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Find posts..." class="border border-gray-200 p-2 w-full rounded">
                        <x-form.button type="primary" class="rounded-md">Search</x-form.button>
                    </form>
                    <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('post', $post->slug) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-admin.dashboard>
</x-layout>