<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">All Participants</h1>
        </div>
        <div v-if="participants.length === 0" class="card shadow mt-5 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h3>No Participants Yet</h3>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="form-text text-muted">Visit a giveaway you've created to get started.</p>
                </div>
            </div>
        </div>
        <div
         v-for='participant in participants' :key='participant.id'
         :class="participant.is_winner == true ? 'card shadow bg-success mt-4 p-2 h-20' : 'card shadow mt-4 p-2 h-20'">
         <div class="row">
            <div class="col-3 mr-auto d-flex align-items-center">
                <h3 class="m-0">{{participant.insta_name}}</h3>
            </div>
            <div v-if="participant.is_winner == true" class="col-3 mr-auto d-flex align-items-center">
                <h3 class="m-0">WINNER</h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button v-on:click="showGiveaway(participant.giveaway_id)" :class="participant.is_winner == true ? 'btn btn-outline-primary p-2' : 'btn shadow btn-outline-primary p-2'">
                    View Giveaway
                </button>
                <button v-if="participant.is_winner == false" v-on:click="editParticipant(participant.giveaway_id, participant.id)" :class="participant.is_winner == true ? 'btn shadow btn-outline-dark ml-2 p-2' : 'btn shadow btn-outline-primary ml-2 p-2'">
                    Edit
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['participants'],
        mounted () {
            // Do something useful with the data in the template
            
        },
        methods: {
            // go to related giveaway page
            showGiveaway: function (giveawayId) {
                window.location = `/giveaways/${giveawayId}`;
            },
            // show page for editing this participant
            editParticipant: function (giveawayId, participantId) {
                window.location = `/giveaways/${giveawayId}/participants/${participantId}/edit`;
            },
        },

    }
</script>