<x-layout.master>
    <section class="px-6 py-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <h1 class="text-2xl font-bold">Publish New Post</h1>
            <form class="space-y-6" action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title: </label>
                    <div class="mt-2">
                        <input id="title"
                               name="title"
                               type="text"
                               autocomplete="name"
                               value="{{ old('title') }}"
                               required
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">Excerpt: </label>
                    <div class="mt-2">
                        <input id="excerpt"
                               name="excerpt"
                               type="text"
                               autocomplete="name"
                               value="{{ old('excerpt') }}"
                               required
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug: </label>
                    <div class="mt-2">
                        <input id="slug"
                               name="slug"
                               type="text"
                               autocomplete="name"
                               value="{{ old('slug') }}"
                               required
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Thumbnail: </label>
                    <div class="mt-2">
                        <input id="thumbnail"
                               name="thumbnail"
                               type="file"
                               autocomplete="name"
                               value="{{ old('thumbnail') }}"
                               required
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body: </label>
                    <textarea id="body"
                              name="body"
                              cols="30"
                              rows="5"
                              placeholder="Quick, think of something to say!"
                              class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('body') }}</textarea>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Category: </label>
                    <select id="category_id" name="category_id" class="block rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('title') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Publish
                    </button>
                </div>


                <x-form.error/>

            </form>
        </div>
    </section>
</x-layout.master>
