<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tutorial CRUD Laravel dengan Jetstream Livewire</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="{{ Session::get('tipe') == 'danger' ? 'bg-red-100 border-red-500 text-red-900' : 'bg-teal-100 border-teal-500 text-teal-900' }} border-t-4 rounded-b px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create Posts</button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <input type="text" wire:model="search">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Desc</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(! $posts->isEmpty())
                    @foreach($posts as $post)
                    <tr>
                        <td class="border px-4 py-2">{{ $post->id }}</td>
                        <td class="border px-4 py-2">{{ $post->title }}</td>
                        <td class="border px-4 py-2">{{ $post->description}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $post->id }})" class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $post->id }})" wire:loading.attr="disabled" wire:target="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            <!-- <div wire:loading wire:target="delete({{ $post->id }})">Deleting...</div> -->
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
            {{ $posts->links() }}
        </div>
    </div>
</div>