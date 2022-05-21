<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <x-jet-label for="name">Name</x-jet-label>
                            <x-jet-input id="name" type="text" wire:model="name" class="mt-1 block w-full" />
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="email">Email</x-jet-label>
                            <x-jet-input id="email" type="text" wire:model="email" class="mt-1 block w-full" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Roles</x-jet-label>
                            <select name="roles" id="roles" wire:model="roles" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'">
                                <option value="ADMIN">ADMIN</option>
                                <option value="USER">USER</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-jet-button wire:click.prevent="store()">Store</x-jet-button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <x-jet-secondary-button wire:click="closeModal()">Cancel</x-jet-secondary-button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>