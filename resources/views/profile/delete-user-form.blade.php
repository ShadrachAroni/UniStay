<x-action-section>
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete your account.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        <div class="mt-5">
            <button class="btn btn-sm btn-danger" wire:click="confirmUserDeletion" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                {{ __('Delete Account') }}
            </button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">{{ __('Delete Account') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
        
                        <div class="mb-3" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <input type="password" id="password" class="form-control"
                                   autocomplete="current-password"
                                   placeholder="{{ __('Password') }}"
                                   x-ref="password"
                                   wire:model="password"
                                   wire:keydown.enter="deleteUser" />
        
                            <x-input-error for="password" class="mt-2" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="button" class="btn btn-sm btn-danger" wire:click="deleteUser" wire:loading.attr="disabled">{{ __('Delete Account') }}</button>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-action-section>
