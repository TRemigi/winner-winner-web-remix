<template>
    <div>
        <div class="row m-2 mb-4">
            <h1 class="mb-4 mr-auto mb-0">Giveaways</h1>
            <button v-on:click="createGiveaway" class="btn shadow btn-outline-primary">
                Add New
            </button>
        </div>
        <div v-if="giveaways.length === 0" class="card shadow mt-5 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h3>No Giveaways Yet</h3>
                </div>
            </div>
        </div>
        <div
         v-for='giveaway in giveaways' :key='giveaway.id'
         class="card shadow mt-4 p-2 h-20">
         <div class="row">
            <div class="col-8 mr-auto d-flex align-items-center">
                <h3 class="m-0">{{giveaway.name}}</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button v-on:click="showGiveaway(giveaway.id)" class="btn shadow btn-outline-primary cust-btn-secondary p-2">
                    View
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['giveaways'],
        mounted () {
            // Do something useful with the data in the template
        },
        methods: {
            // go to giveaway show route
            showGiveaway: function (id) {
                window.location = `/giveaways/${id}`;
            },
            // go to giveaway create route
            createGiveaway: function () {
                window.location = '/giveaways/create';
            }
        },

    }
</script>