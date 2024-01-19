<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->role->name == 'admin')


                        Recevied Aplication
                    @foreach($applications as $application)
                                <div class="max-xl:">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                        <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{$application->id}}</button>
                                        <div class="text-xs text-neutral-500">{{$application->created_at}}</div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-6">
                                    <div class="mb-3 text-xl font-bold">{{$application->subject }}</div>
                                    <div class="text-sm text-neutral-600">{{$application->message }}</div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500">
                                  {{$application->user->email}}

                        </div>




                                            @endforeach
                                    {{$application->links()}}
                                        </div>

                    @else(auth()->user()->role->name == 'user')
                    Your client

                                            <div class='flex items-center' >
                                                <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                                    <div class='max-w-md mx-auto space-y-6'>

                                                        <form action="{{route('aplications.store')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <h2 class="text-2xl font-bold ">Submit your application</h2>
                                                            <p class="my-4 opacity-70">Adipisicing elit. Quibusdam magnam sed ipsam deleniti debitis laboriosam praesentium dolorum doloremque beata.</p>
                                                            <hr class="my-6">
                                                            <label class="uppercase text-sm font-bold opacity-70">Subject</label>
                                                            <input type="text" name="subject" required class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                                            <label class="uppercase text-sm font-bold opacity-70">Message</label>
                                                            <textarea name="message" required class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                                            <label class="uppercase text-sm font-bold opacity-70">File</label>
                                                            <input type="file" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                                            <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-danger font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Send">
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
