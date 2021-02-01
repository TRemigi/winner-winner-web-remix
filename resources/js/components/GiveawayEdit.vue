<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">Edit Giveaway</h1>
        </div>
        <form @submit.prevent="editGiveaway">
            <div class="form-group">
                <label for="giveawayName">Giveaway Name</label>
                <input type="text" class="form-control" v-model="giveawayName" :placeholder="giveaway.name">
                <small class="form-text text-muted">Give your giveaway a descriptive name. And hey, try to get it right this time...</small>
            </div>
            <button type="submit" class="btn btn-outline-primary shadow">Submit</button>
        </form>
        <div class="row m-1 mt-5">
            <button v-on:click="deleteGiveaway" class="btn btn-danger shadow p-2">
                Delete Giveaway
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                giveawayName: ''
            }
        },
        props: ['giveaway', 'user'],
        methods: {
            editGiveaway: function () {
                axios.put(`/giveaways/${this.giveaway.id}`, {name: this.giveawayName, user_id: this.user})
                .then(response => window.location = `/giveaways/${response.data.id}`);
            },
            deleteGiveaway: function () {
                axios.delete(`/giveaways/${this.giveaway.id}`)
                .then(response => window.location = '/giveaways');
            }
        },
    }
</script>