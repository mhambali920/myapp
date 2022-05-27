<div>
    <div class="flex flex-col md:flex-row items-center justify-between max-w-7xl pt-6 mx-4 md:mx-auto sm:px-6 lg:px-8">
        <h2 class="block font-semibold text-xl text-gray-800 leading-tight">Laporan Akun Lazada</h2>
        <div class="mt-2 md:mt-0">
            <x-jet-secondary-button wire:click="openModal">Upload CSV</x-jet-secondary-button>
            <x-jet-danger-button wire:click="hapusData">Delete</x-jet-danger-button>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 max-w-7xl py-8 mx-4 md:mx-auto sm:px-6 lg:px-8">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 light-shadow">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Pembayaran
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Rp 0 </p>
            </div>
        </div>
        <!-- Card -->
        <div x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
            <div class="relative" x-show.transition.origin.top="tooltip" style="display: none;">
                <div class="absolute top-0 z-10 p-1 -mt-1 text-xs leading-tight text-white transform -translate-y-full bg-orange-500 rounded-lg shadow-lg">
                    clik disi untuk mengedit
                </div>
                <svg class="absolute z-10 w-6 h-6 text-orange-500 transform -translate-y-3 fill-current stroke-current" width="8" height="8">
                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)"></rect>
                </svg>
            </div>
            <a href="https://kreasip.my.id/dashboard/laporan_pembayaran_lazada/atur_harga_modal_produk">
                <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 light-shadow">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Modal Produk
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            Rp 0 </p>
                    </div>
                </div>
            </a>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 light-shadow">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Laba Penjualan
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Rp 0 </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 light-shadow">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Produk
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    0 </p>
            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-4 md:mx-auto sm:px-6 lg:px-8">
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
                <div>
                    <p class="block mb-4 font-semibold text-lg text-gray-800 leading-tight">Periode Transaksi</p>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Nama Pembayaran</th>
                                <th class="border px-4 py-2">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">Nama Pembayaran</td>
                                <td class="border px-4 py-2">Nama Pembayaran</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="isModalOpen">
        <form wire:submit.prevent="uploadCsv" method="POST" enctype="multipart/form-data">
            @csrf
            <x-slot name="title">
                {{ __('Upload your CSV File') }}
            </x-slot>
            <x-slot name="content">

                <div>Upload file csv yang di download dari akun sellercenter lazada versi baru</div>
                <div class="w-full border mt-2">
                    <input type="file" wire:model="csv" id="csv{{ $iteration }}" name="csv" class="block w-full text-sm text-slate-500
          file:mr-4 file:py-2 file:px-4
          file:rounded-lg file:border-0 file:outline-none
          file:text-sm file:font-semibold
          file:bg-indigo-50 file:text-indigo-700
          hover:file:bg-indigo-100
          focus:file:outline-none">
                    @error('csv') <span class="error">{{ $message }}</span> @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('isModalOpen')">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3" wire:click="uploadCsv">
                    {{ __('Upload') }}
                </x-jet-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>
</div>