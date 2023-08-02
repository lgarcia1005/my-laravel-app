@props(['heading'])
<section class="px-6 py-8">
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm lg:max-w-4xl">
        <h1 class="text-2xl font-bold pb-2 border-b">{{ $heading }}</h1>

        <div class="flex">
            <aside class="w-48 mt-5 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul class="">
                    <li>
                        <a href="/admin/posts" class="{{ request()->routeIs('admin.post.home') ? 'text-blue-500': '' }}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->routeIs('admin.post.create') ? 'text-blue-500': '' }}">New Post</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>
</section>
