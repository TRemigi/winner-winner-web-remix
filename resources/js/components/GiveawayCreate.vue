<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">Create Giveaway</h1>
        </div>
        <form @submit.prevent="createNewGiveaway">
            <div class="form-group">
                <label for="giveawayName">Giveaway Name</label>
                <input type="text" class="form-control" v-model="giveawayName" placeholder="Lendio Promo Giveaway">
                <small class="form-text text-muted">Give your giveaway a descriptive name.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                giveawayName: ''
            }
        },
        methods: {
            createNewGiveaway() {
                axios.post('/giveaways', {name: this.giveawayName})
                .then(response => window.location = `/giveaways/${response.data.id}`);
            },
        },
    }
</script>