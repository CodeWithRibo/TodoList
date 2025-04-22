<x-layout>
    <div class="pt-32 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4">

                @if ($errors->any())
                    <ul class="px-5 py-5 bg-red-500">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                @endif
                <h1 class="text-grey-darkest">Todo List</h1>
                <form action="{{ route('add') }}" method="POST">
                    @csrf
                    <div class="flex mt-4">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Todo" name="list" id="list" required>
                        <button type="submit"
                            class="flex-no-shrink p-2 border-2 rounded text-teal border-teal  hover:bg-teal-400 cursor-pointer">Add</button>
                    </div>
                </form>
            </div>
            <div>
                <div class="flex flex-col mb-4">
                    @foreach ($notes as $note)
                        <div class="flex flex-row items-center gap-5 justify-between">
                            <p class="flex-1 text-left">{{ $note->list }}</p>
                            <form action="{{ route('destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex gap-2">
                                    <button class="flex-no-shrink hover:text-red-400 cursor-pointer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                                <form action="{{ route('edit',$note->id) }}" method="POST">
                                    @csrf
                                    <button class="flex-no-shrink hover:text-red-400 cursor-pointer">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
