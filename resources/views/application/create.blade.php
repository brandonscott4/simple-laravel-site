<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('application.store')}}" method="POST">
                @csrf
                <div class="flex flex-col">
                    <label for="job_title">Job Title*</label>
                    <input type="text" name="job_title" placeholder="Software Developer" class="mb-4" required>
                    <label for="company">Company</label>
                    <input type="text" name="company" placeholder="Google" class="mb-4">
                    <label for="location">Location</label>
                    <input type="text" name="location" placeholder="London" class="mb-4">
                    <label for="link">Link*</label>
                    <input type="text" name="link" placeholder="https://uk.indeed.com/jobexample" class="mb-4" required>
                    <div class="flex flex-col md:flex-row gap-0 md:gap-8">
                        <div class="flex flex-col">
                            <label for="status">Status*</label>
                             <select name="status" class="w-40 mb-4" required>
                                <option value="Awaiting">Awaiting</option>
                                <option value="Successful">Successful</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="date_applied">Date*</label>
                            <input type="date" name="date_applied" class="w-40 mb-4" required>
                        </div>
                    </div>
                    <label for="note">Note</label>
                    <textarea name="note" placeholder="Enter your note here." rows="5" ></textarea>

                    <button type="submit" class="border border-black w-24 rounded hover:bg-gray-200 mt-8 p-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>