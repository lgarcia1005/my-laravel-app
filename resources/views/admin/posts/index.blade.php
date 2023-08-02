<x-layout.master>
    <x-settings.setting heading="Manage Posts">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mb-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-50 uppercase bg-gray-500 dark:bg-gray-700 dark:text-white-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    @php
                        $isLast = $loop->last;
                        $class = $isLast ? '' : ($loop->iteration % 2 === 0 ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800');
                    @endphp

                    <tr class="{{ $class }} border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <a class="font-medium underline hover:text-blue-500" href="/posts/{{ $post->slug }}">
                                {{ $post->title }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            <a href="/admin/posts/{{ $post->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/admin/posts/{{ $post->id }}" method="POST" class="mb-0" x-data="{conf: false, check: false}" @submit.prevent="if(conf == false) return;$el.submit()">
                                @csrf
                                @method('DELETE')
                                <button class="text-gray-500" @click="check = confirm('are you sure want to delete: {{ $post->title }}?'); conf = check;" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $posts->links() }}
    </x-settings.setting>
</x-layout.master>
