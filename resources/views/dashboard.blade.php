<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" x-data>
                    @foreach ($users as $user)
                        <div>
                            <!-- Button to open modal -->
                            <button type="button" class="btn my-2" @click="$store.modal.openModal({{ $user->id }})">
                                {{ $user->name }}
                            </button>
                        </div>
                    @endforeach

                    <!-- Modal -->
                    <template x-if="$store.modal.showModal">
                        <dialog id="my_modal_3" class="modal" open>
                            <div class="modal-box">
                                <button type="button" class="btn btn-circle btn-ghost btn-sm absolute right-2 top-2"
                                    @click="$store.modal.closeModal()">✕</button>

                                <h3 class="text-lg font-bold">User Information</h3>

                                <template x-if="$store.modal.userData">
                                    <div>
                                        <p><strong>Name:</strong> <span x-text="$store.modal.userData.name"></span></p>
                                        <p><strong>Email:</strong> <span x-text="$store.modal.userData.email"></span>
                                        </p>
                                    </div>
                                </template>
                                <p x-show="!$store.modal.userData">Loading...</p>

                                <form method="dialog" class="modal-backdrop">
                                    <button type="button" class="btn"
                                        @click="$store.modal.closeModal()">Close</button>
                                </form>
                            </div>
                        </dialog>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
