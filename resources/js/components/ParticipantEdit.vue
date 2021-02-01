<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">Edit Participant {{ participant.insta_name }}</h1>
            <button v-on:click="backToGiveaway" class="btn btn-primary cust-btn-primary">
                Back to Giveaway
            </button>
        </div>
        <form @submit.prevent="editParticipant">
            <div class="form-group">
                <label for="participantName">Participant Instagram Name</label>
                <input type="text" class="form-control" v-model="participantName" :placeholder="participant.insta_name">
                <small class="form-text text-muted">Enter the instagram username of the giveaway participant, and don't screw it up this time.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row m-1 mt-5">
            <button v-on:click="deleteParticipant" class="btn btn-danger cust-btn-delete p-2">
                Delete Participant
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['giveaway', 'participant'],
        data() {
            return {
                participantName: ''
            }
        },
        methods: {
            editParticipant: function () {
                axios.put(`/giveaways/${this.giveaway.id}/participants/${this.participant.id}`, {
                    insta_name: this.participantName,
                    giveaway_id: this.giveaway.id,
                    user_id: this.participant.user_id
                    })
                .then(response => window.location = `/giveaways/${response.data.giveaway_id}`);
            },
            backToGiveaway: function () {
                window.location = `/giveaways/${this.giveaway.id}`;
            },
            deleteParticipant: function () {
                axios.delete(`/giveaways/${this.giveaway.id}/participants/${this.participant.id}`)
                .then(response => window.location = `/giveaways/${response.data.giveaway_id}`);
            }
        },
    }
</script>