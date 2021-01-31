<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">All Participants</h1>
            <!-- <button v-on:click="createGiveaway" class="btn btn-primary cust-btn-primary">
                Add New
            </button> -->
        </div>
        <div
         v-for='participant in participants' :key='participant.id'
         :class="participant.is_winner == true ? 'card bg-success mt-2 p-2 h-20' : 'card mt-2 p-2 h-20'">
         <div class="row">
            <div class="col-4 mr-auto d-flex align-items-center">
                <h3 class="m-0">{{participant.insta_name}}</h3>
            </div>
            <div v-if="participant.is_winner == true" class="col-4 mr-auto d-flex align-items-center">
                <h3 class="m-0">WINNER</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button v-on:click="showGiveaway(participant.giveaway_id)" :class="participant.is_winner == true ? 'btn btn-outline-dark cust-btn-secondary p-2' : 'btn btn-outline-primary cust-btn-secondary p-2'">
                    View Giveaway
                </button>
                <button v-on:click="editParticipant(participant.giveaway_id, participant.id)" :class="participant.is_winner == true ? 'btn btn-outline-dark cust-btn-secondary ml-2 p-2' : 'btn btn-outline-primary cust-btn-secondary ml-2 p-2'">
                    Edit
                </button>
                <button v-on:click="deleteParticipant" class="btn btn-danger cust-btn-delete ml-2 p-2">
                    Delete
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
            showGiveaway: function (giveawayId) {
                window.location = `/giveaways/${giveawayId}`;
            },
            editParticipant: function (giveawayId, participantId) {
                window.location = `/giveaways/${giveawayId}/participants/${participantId}/edit`;
            },
            deleteParticipant: function () {
                axios.delete(`/giveaways/${this.giveaway.id}/participants/${this.participant.id}`)
                .then(response => window.location = `/participants`);
            }
        },

    }
</script>