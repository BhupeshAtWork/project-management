<x-app-layout>
    <x-slot name="header">
        <div class="block flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <x-button class="ml-auto">
                <a href="{{ route('user.create') }}">
                    {{ __('Add user') }}
                </a>
            </x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!empty($users) && $users->count())
                        <table class="w-full">
                            <thead>
                                <tr class="mh-px-10">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="ta-center">
                                @foreach($users as $user)
                                <tr class="mh-px-10">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                                    <td class="w-em-20">
                                        <x-button class="mr-4">
                                            <a href="{{ route('user.edit', $user->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                        </x-button>
                                        <x-button class="mr-4">
                                            <a href="{{ route('user.delete', $user->id) }}">
                                                {{ __('Delete') }}
                                            </a>
                                        </x-button>
                                        <x-button>
                                            <a href="{{ route('user.tree', $user->id) }}">
                                                {{ __('Tree') }}
                                            </a>
                                        </x-button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {!! $users->links() !!}
                        </div>
                    @else
                        <span>No Users Found</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
