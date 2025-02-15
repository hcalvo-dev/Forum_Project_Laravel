<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ route('administrar.users.index') }}" method="get" class="mb-6">
                            <div class="flex items-center space-x-2 bg-gray-800 p-3 rounded-lg shadow-md">
                                <input type="text" name="search"
                                    class="w-full px-4 py-2 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Buscar usuario...">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 shadow">
                                    Buscar
                                </button>
                            </div>
                        </form>

                        <table
                            class="table-auto w-full border-collapse border border-gray-700 bg-gray-900 text-white rounded-lg shadow-lg">
                            <thead>
                                <tr class="bg-gray-800">
                                    <th class="px-4 py-3 border border-gray-700 text-left">Id</th>
                                    <th class="px-4 py-3 border border-gray-700 text-left">Name</th>
                                    <th class="px-4 py-3 border border-gray-700 text-left">Email</th>
                                    <th class="px-4 py-3 border border-gray-700 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-700 transition duration-300">
                                        <td class="px-4 py-2 border border-gray-700">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border border-gray-700">{{ $user->name }}</td>
                                        <td class="px-4 py-2 border border-gray-700">{{ $user->email }}</td>
                                        <td
                                            class="px-4 py-2 border border-gray-700 text-center flex justify-evenly">
                                            <a class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded transition duration-300"
                                                href="{{ route('administrar.users.edit', $user) }}">
                                                Editar
                                            </a>
                                            @can('administrar.users.destroy')
                                                <a class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded transition duration-300"
                                                    href="{{ route('administrar.users.destroy', $user) }}">
                                                    Eliminar
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-center mt-4">
                            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
