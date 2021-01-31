<template>
    <div>
        <div v-if="isComplete" class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">{{ giveaway.name }}</h1>
            <div>
                <h2>COMPLETED</h2>
            </div>
        </div>
        <div v-else class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">{{ giveaway.name }}</h1>
            <button v-on:click="editGiveaway()" class="btn btn-primary cust-btn-primary">
                Edit Name
            </button>
            <button v-if="winnerChosen" v-on:click="completeGiveaway()" class="btn btn-primary cust-btn-primary ml-2">
                Mark Complete
            </button>
            <button v-on:click="chooseWinner" class="btn btn-warning cust-btn-winners ml-2">
                Choose Winner
            </button>
        </div>
        <div
         v-for='participant in participants' :key='participant.id'
         :class="participant.is_winner == true ? 'card mt-2 p-2 h-20 bg-success' : 'card mt-2 p-2 h-20'">
         <div :class="participant.is_winner == true ? 'row warning is-winner' : 'row'">
            <div class="col-8 mr-auto d-flex align-items-center">
                <h3 class="m-0">{{participant.insta_name}}</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button v-on:click="editParticipant(participant.id)" :class="participant.is_winner == true ? 'btn btn-outline-dark cust-btn-secondary p-2' : 'btn btn-outline-primary cust-btn-secondary p-2'">
                    Edit
                </button>
            </div>
            </div>
        </div>
        <div v-if="isComplete == false" class="row mt-2">
            <div class="col-12 d-flex justify-content-center">
                <button v-on:click="addParticipant()" class="btn btn-primary cust-btn-secondary p-2">
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
            editGiveaway: function () {
                window.location = `/giveaways/${this.giveaway.id}/edit`;
            },
            editParticipant: function (participantId) {
                window.location = `/giveaways/${this.giveaway.id}/participants/${participantId}/edit`;
            },
            addParticipant: function () {
                window.location = `/giveaways/${this.giveaway.id}/participants/create`
            },
            chooseWinner: function () {
                let winner = this.participants[Math.floor(Math.random()*this.participants.length)];
                axios.put(`/giveaways/${this.giveaway.id}/participants/${winner.id}`, {
                    insta_name: winner.insta_name,
                    giveaway_id: winner.giveaway_id,
                    is_winner: true
                    })
                .then(window.location.reload());
            },
            completeGiveaway: function () {
                axios.put(`/giveaways/${this.giveaway.id}`, {
                    name: this.giveaway.name,
                    complete: true,
                    })
                .then(window.location.reload());
            }

        },

    }
</script>