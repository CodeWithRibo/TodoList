<x-layout>

    <form action="{{ route('updateData', $taskList->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input class="border-2 border-red-500" type="text" name="list" id="actuallyUpdate" value="{{ $taskList->list }}">
        <button type="submit">Save change</button>
    </form>

</x-layout>
