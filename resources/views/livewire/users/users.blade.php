<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users Management</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 overflow-x-auto">
            @if (session()->has('message'))
            <div class="{{ Session::get('tipe') == 'danger' ? 'bg-red-100 border-red-500 text-red-900' : 'bg-teal-100 border-teal-500 text-teal-900' }} border-t-4 rounded-b px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif

            @if($isModalOpen)
            @include('livewire.users.create')
            @endif
            <x-jet-input type="text" wire:model="search" class="mb-2 block" placeholder="Search user..." />
            <table class="table-responsive w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 w-20">No.</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Roles</th>
                        <th class="border px-4 py-2">Last Login</th>
                        <th class="border px-4 py-2">IP Address</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(! $users->isEmpty())
                    @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->roles }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}</td>
                        <td class="border px-4 py-2">{{ $user->last_login_ip }}</td>
                        <td class="border px-4 py-2">
                            <x-jet-button wire:click="edit({{ $user->id }})">Edit</x-jet-button>
                            <x-jet-danger-button wire:click="confirmDelete({{ $user->id }})">Delete</x-jet-danger-button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">no data found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="my-4">
                {{ $users->links() }}
            </div>
        </div>
        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }} <span class="text-gray-500">{{ $email }}</span>
            </x-slot>
            <x-slot name="content">
                {{ __('Are you sure you want to delete this account? Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmUserDeletion')">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click.prevent="delete()" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>