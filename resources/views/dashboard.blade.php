<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 ml-11 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if ($users->isEmpty())
                        <p>No users found.</p>
                    @else
                        <div class="grid grid-cols-1 gap-4">
                        @foreach ($users as $user)
                            <div class="bg-white shadow-md rounded-lg p-4 mb-4 flex items-center justify-between">
                                <div>
                                    <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                </div>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-blue-300 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
