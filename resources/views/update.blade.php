<x-layout>

    <form action="{{ route('updateData', $taskList->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col pt-32 gap-5 ">
            <input class="border border-sky-500 py-3" type="text" name="list" id="list" placeholder="update"
                value="{{ $taskList->list }}">
            <button type="submit" class="py-2 px-5 text-white bg-green-500 hover:bg-green-700 cursor-pointer transition-all duration-300 ">Save change</button>
        </div>
    </form>

</x-layout>
