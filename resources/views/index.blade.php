<x-layout>
    <div class="pt-32 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <h1 class="text-blue-600 text-center font-bold">GHAGI MANN PRODUCTION TO-DO LIST</h1>
            <div class="mb-4">
                @if ($errors->any())
                    <ul class="px-5 py-2 bg-red-500 text-white">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                @endif

                @if (session('successCreated'))
                    <div class="bg-emerald-500 text-white py-2 px-5">
                        {{ session('successCreated') }}
                    </div>
                @elseif(session('successDeleted'))
                    <div class="bg-red-500 text-white py-2 px-5">
                        {{ session('successDeleted') }}
                    </div>
                @endif
                <form action="{{ route('add') }}" method="POST">
                    @csrf
                    <div class="flex mt-4">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                            placeholder="Add Todo" name="list" id="listItem">
                        <button type="submit"
                            class="flex-no-shrink p-2 border-2 rounded text-teal border-teal  hover:bg-teal-400 cursor-pointer">Add</button>
                    </div>
                </form>
            </div>
            <div>
                <div class="flex flex-col mb-4">
                    @foreach ($notes as $note)
                        <div class="flex flex-row items-center gap-5 justify-between">
                            <p class="flex-1 text-left text-gray-500 font-semibold" id="markTask-{{ $note->id }}">{{ $note->list }}</p>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const taskElement = document.getElementById('markTask-{{ $note->id }}');
                                    
                                    const savedState = localStorage.getItem('{{ $note->id }}');
                                    if (savedState === 'completed') {
                                        taskElement.classList.add('line-through', 'text-gray-500', 'font-semibold');
                                        taskElement.classList.remove('text-gray-500');
                                    }

                                    taskElement.addEventListener('click', function() {
                                        const isCompleted = taskElement.classList.toggle('line-through');
                                        localStorage.setItem('{{ $note->id }}', isCompleted ? 'completed' : 'pending');

                                    });
                                });
                            </script>
                            <form action="{{ route('destroy', $note->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="flex gap-2">
                                    <button class="flex-no-shrink hover:text-red-400 cursor-pointer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                            </form>
                        </div>
                        <a href="{{ route('showEdit', $note->id) }}">
                            <button class="flex-no-shrink hover:text-emerald-500 cursor-pointer">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-layout>
