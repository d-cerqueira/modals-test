<div x-data="{ showModal: false, userData: null }" @open-modal.window="fetchUser($event.detail)">
    <!-- Button to open modal -->
    <button type="button" class="btn btn-primary" @click="$dispatch('open-modal', {{ $user->id }})">
        View User Info
    </button>

    <!-- Modal -->
    <template x-if="showModal">
        <div class="modal fade show d-block" id="userModal" tabindex="-1" aria-hidden="true"
            style="display: block; background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Information</h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <div class="modal-body" x-show="userData">
                        <template x-if="userData">
                            <div>
                                <p><strong>Name:</strong> <span x-text="userData.name"></span></p>
                                <p><strong>Email:</strong> <span x-text="userData.email"></span></p>
                            </div>
                        </template>
                        <p x-show="!userData">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
