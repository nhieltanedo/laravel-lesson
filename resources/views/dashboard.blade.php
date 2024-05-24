<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! ") }} <b>{{ Auth::user()->name }}</b>  
                </div>
            </div>
        </div>
    </div>
  
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="font-monospace"><small><b>Total post: </b>{{ $totalPosts }}</small></p>
            <hr>
            <p class="font-monospace"><small><b>Total Published Post: </b>{{ $totalPublish }}</small></p>
            <hr>
            <p class="font-monospace"><small><b>Total Unpublished Post: </b>{{ $totalUnPublish }}</small></p>
            <hr>
            <!-- <p class="font-monospace">Total publish post:<b>{{ $totalPosts }}</b> </p> -->
        </div>
    </div>
    <!-- <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p><small><b>Total post: </b>{{ $totalPublish }}</small></p>
            <hr>
            <p class="font-monospace">Total publish post:<b>{{ $totalPosts }}</b> </p> 
        </div>
    </div> -->
  
</x-app-layout>