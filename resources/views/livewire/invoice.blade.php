<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Generate Invoice') }}
        </h2>

        @if (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('status') }}</span>
            </div>
        @endif
    </header>

    <form wire:submit="generateInvoice" class="mt-6 space-y-6">
        <div>
            <x-input-label for="product" :value="__('Select a product')" />
            <select wire:model="product" wire:change="selectProduct" name="product" id="product" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('Select a product') }}</option>
                @forelse($products as $key => $product)
                <option value="{{ $key }}">{{ $product }}</option>
                @empty
                @endforelse
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('product')" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />

            <span class="p-2 mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $price }}</span>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="mr-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
