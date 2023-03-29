<x-app-layout>
    @section('content')
        <div class="max-w-7xl mx-auto p-6 lg:p-8 flex space-x-24">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <p class="text-white font-semibold text-lg text-center mb-6">Add a new post</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-semibold text-orange-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base text-white font-semibold leading-7">Disclaimer</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-300">This is just a test blog, do not worry</p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
                                <div class="sm:col-span-4">
                                    <label for="username" class="block text-sm font-medium leading-6 text-gray-300">Title</label>
                                    <div class="mt-2 w-full">
                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md w-full">
                                            <input type="text" name="title" id="title" autocomplete="title" class="block w-full flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-300 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Your awesome title">
                                        </div>
                                    </div>
                                    <div class="col-span-full mt-4">
                                        <label for="about" class="block text-sm font-medium leading-6 text-white">Content</label>
                                        <div class="mt-2">
                                            <textarea id="content" name="content" rows="3" class="block w-full rounded-md border-0 text-gray-300 bg-transparent shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                                        </div>
                                        <p class="mt-3 text-sm leading-6 text-gray-500">Write a few sentences about this post.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="rounded-md text-sm font-semibold leading-6 px-2 py-1 text-gray-300 border border-gray-300">Cancel</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
            <div class="mt-12 relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    @forelse($posts as $post)
                    <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$post->title}}</h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">{{$post->content}}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                    @empty
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div class="text-white text-xl text-semibold">Ups, there are no posts yet from this user</div>
                        </div>
                    @endforelse
                </div>

                <div class="w-full absolute bottom-0">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>

