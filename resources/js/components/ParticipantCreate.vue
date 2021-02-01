<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">Add Participant to {{ giveaway.name }}</h1>
            <button v-on:click="backToGiveaway" class="btn shadow btn-outline-primary cust-btn-primary">
                Back to Giveaway
            </button>
        </div>
        <form @submit.prevent="createNewParticipant">
            <div class="form-group">
                <label for="participantName">Participant Instagram Name</label>
                <input type="text" class="form-control" v-model="participantName" placeholder="wants2work4Lendio">
                <small class="form-text text-muted">Enter the instagram username of the giveaway participant.</small>
            </div>
            <button type="submit" class="btn shadow btn-outline-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['giveaway'],
        data() {
            return {
                participantName: ''
            }
        },
        methods: {
            createNewParticipant: function () {
                axios.post(`/giveaways/${this.giveaway.id}/participants`, {
                    insta_name: this.participantName,
                    giveaway_id: this.giveaway.id,
                    user_id: this.giveaway.user_id
                    })
                    .then(response => window.location = `/giveaways/${response.data.giveaway_id}`);
            },
            backToGiveaway: function () {
                window.location = `/giveaways/${this.giveaway.id}`;
            }
        },
    }
</script>