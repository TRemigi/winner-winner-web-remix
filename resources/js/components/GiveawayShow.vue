<template>
    <div>
        <div v-if="isComplete" class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">{{ giveaway.name }}</h1>
            <div>
                <h2>COMPLETED</h2>
            </div>
            <button v-on:click="deleteGiveaway" class="btn shadow btn-outline-danger cust-btn-delete ml-2 p-2">
                Delete Giveaway
            </button>
        </div>
        <div v-else class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">{{ giveaway.name }}</h1>
            <button v-on:click="editGiveaway()" class="btn shadow btn-outline-primary cust-btn-primary">
                Edit
            </button>
            <button v-if="winnerChosen" v-on:click="completeGiveaway()" class="btn shadow btn-outline-primary cust-btn-outline-primary ml-2">
                Mark Complete
            </button>
            <button v-if="participants.length >= 2" v-on:click="chooseWinner" class="btn shadow btn-outline-primary cust-btn-winners ml-2">
                Choose Winner
            </button>
            <button v-on:click="deleteGiveaway" class="btn shadow btn-outline-danger ml-2 p-2">
                Delete Giveaway
            </button>
        </div>
        <div v-if="participants.length === 0" class="card shadow mt-5 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h3>No Participants Yet</h3>
                </div>
            </div>
        </div>
        <div
         v-for='participant in participants' :key='participant.id'
         :class="participant.is_winner == true ? 'card shadow mt-4 p-2 h-20 bg-success' : 'card shadow mt-4 p-2 h-20'">
            <div :class="participant.is_winner == true ? 'row warning is-winner' : 'row'">
                <div class="col-2 mr-auto d-flex align-items-center">
                    <h3 class="m-0">{{participant.insta_name}}</h3>
                </div>
                <div v-if="participant.is_winner == true" class="col-5 d-flex align-items-center">
                    <h3 class="m-0">WINNER</h3>
                </div>
                <div v-if="isComplete == false & participant.is_winner == false" class="col-2 d-flex justify-content-end">
                    <button v-on:click="editParticipant(participant.id)" :class="participant.is_winner == true ? 'btn shadow btn-outline-dark p-2' : 'btn shadow btn-outline-primary p-2'">
                        Edit
                    </button>
                </div>
            </div>
        </div>
        <div v-if="isComplete == false" class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                <button v-on:click="addParticipant()" class="btn shadow btn-outline-primary p-2">
                    Add Participants
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['giveaway', 'participants'],
        mounted () {
            // Do something useful with the data in the template
            
            if (this.giveaway.complete == true) {
                this.isComplete = true;
            }

            this.participants.forEach(participant => {
                if (participant.is_winner == true) {
                    return this.winnerChosen = true;
                }
            });

        },
        data() {
            return {
                winnerChosen: false,
                isComplete: false,
            }
        },
        methods: {
            // go to giveaway edit route
            editGiveaway: function () {
                window.location = `/giveaways/${this.giveaway.id}/edit`;
            },
            // go to participant edit route
            editParticipant: function (participantId) {
                window.location = `/giveaways/${this.giveaway.id}/participants/${participantId}/edit`;
            },
            // go to participant create route
            addParticipant: function () {
                window.location = `/giveaways/${this.giveaway.id}/participants/create`
            },
            // get a random index from array of participants and make a put request updating the "is_winner" column
            chooseWinner: function () {
                let winner = this.participants[Math.floor(Math.random()*this.participants.length)];
                axios.put(`/giveaways/${this.giveaway.id}/participants/${winner.id}`, {
                    insta_name: winner.insta_name,
                    giveaway_id: winner.giveaway_id,
                    user_id: winner.user_id,
                    is_winner: true
                    })
                .then(response => window.location = `/giveaways/${response.data.giveaway_id}`);
            },
            // make a put request updating this giveaway as complete
            completeGiveaway: function () {
                axios.put(`/giveaways/${this.giveaway.id}`, {
                    name: this.giveaway.name,
                    complete: true,
                    user_id: this.giveaway.user_id
                    })
                .then(response => window.location = `/giveaways/${response.data.id}`);
            },
            // make a delete request, wait for response, then go to giveaways index
            deleteGiveaway: function () {
                axios.delete(`/giveaways/${this.giveaway.id}`)
                .then(response => window.location = '/giveaways');
            },

        },

    }
</script>