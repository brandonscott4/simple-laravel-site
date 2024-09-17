<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if($applications->isEmpty())
            <p>No job applications found.</p>
            @else

            <div class="flex flex-col gap-8">
                @foreach($applications as $application)
                <div class="border border-black p-4 rounded-xl bg-white">
                    <div class="flex flex-col md:flex-row md:justify-between mb-4 md:mb-2">
                        <h3><a href="{{$application->link}}" target="_blank" rel="noopener noreferrer" class="text-blue-700 hover:underline text-lg">{{$application->job_title}} - {{$application->company}}</a></h3>
                        <p class="rounded-3xl bg-gray-200 px-2 w-24 text-center mt-1 md:mt-0">{{$application->status}}</p>
                    </div>
                    <p>Location: <b>{{$application->location}}</b></p>
                    <p>Date Applied: <b>{{$application->date_applied}}</b></p>
                    <p>Note: <b>{{$application->note}}</b></p>

                    <div class="flex mt-8">
                        <a href="{{route('application.edit', $application)}}">
                            <button class="border border-black w-24 rounded hover:bg-yellow-100 p-2 mr-3">Edit</button>
                        </a>
                        <form action="{{route('application.destroy', $application)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border border-black w-24 rounded hover:bg-red-100 p-2">Delete</button>
                        </form>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="mt-6">
                {{$applications->links()}}
            </div>


            @endif
            
        </div>
    </div>
</x-app-layout>
