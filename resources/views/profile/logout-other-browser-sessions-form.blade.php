<x-action-section>
    <x-slot name="title">
        {{ __('Browser Sessions') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage and log out your active sessions on other browsers and devices.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <div style="margin-left: 20px">
                                    <i data-feather="monitor"></i>
                                </div>
                            @else
                                <div style="margin-left: 20px">
                                    <i data-feather="tablet"></i>
                                </div>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('This device') }}</span>
                                    @else
                                        {{ __('Last active') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <button class="btn btn-sm btn-primary" wire:click="confirmLogout" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#logoutOtherSessionsModal">
                {{ __('Log Out Other Browser Sessions') }}
            </button>

            <x-action-message class="ms-3" on="loggedOut">
                {{ __('Done.') }}
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <div class="modal fade" id="logoutOtherSessionsModal" tabindex="-1" aria-labelledby="logoutOtherSessionsModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutOtherSessionsModalLabel">{{ __('Log Out Other Browser Sessions') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
        
                        <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control"
                                   autocomplete="current-password"
                                   placeholder="{{ __('Password') }}"
                                   x-ref="password"
                                   wire:model="password"
                                   wire:keydown.enter="logoutOtherBrowserSessions" />
        
                            <x-input-error for="password" class="mt-2" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="button" class="btn btn-primary"
                                wire:click="logoutOtherBrowserSessions"
                                wire:loading.attr="disabled">{{ __('Log Out Other Browser Sessions') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-action-section>
