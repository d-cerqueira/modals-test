document.addEventListener('alpine:init', () => {
    Alpine.store('modal', {
        showModal: false,
        userData: null,

        openModal(user) {
            this.showModal = true;
            this.userData = null;
            this.fetchUser(user);
        },

        closeModal() {
            this.showModal = false;
            this.userData = null;
        },

        fetchUser(user) {
            axios.get(`/dashboard/${user}`)
                .then(response => {
                    this.userData = response.data;
                })
                .catch(error => {
                    console.error('Error loading user data:', error);
                    this.userData = {
                        name: 'Error',
                        email: 'Error loading data'
                    };
                });
        }
    });
});
