<x-layout.master>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 uppercase">Login</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="/login" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username: </label>
                            <div class="mt-2">
                                <input id="username"
                                       name="username"
                                       type="text"
                                       autocomplete="username"
                                       value="{{ old('username') }}"
                                       required
                                       class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('username') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password"
                                       name="password"
                                       type="password"
                                       autocomplete="current-password"
                                       required
                                       class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-{{ $errors->has('username') ? 'red' : 'gray' }}-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-600 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Login
                            </button>
                        </div>


                        <x-form.error/>

                    </form>

                    <p class="mt-10 text-center text-xs text-gray-500">
                        Not a member?
                        <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
                    </p>
                </div>
            </div>

        </main>
    </section>
</x-layout.master>
