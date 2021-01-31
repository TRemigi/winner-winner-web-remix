<template>
    <div>
        <div class="row m-2">
            <h1 class="mb-4 mr-auto mb-0">Giveaways</h1>
            <button v-on:click="createGiveaway" class="btn btn-primary cust-btn-primary">
                Add New
            </button>
        </div>
        <div
         v-for='giveaway in giveaways' :key='giveaway.id'
         class="card mt-2 p-2 h-20">
         <div class="row">
            <div class="col-8 mr-auto d-flex align-items-center">
                <h3 class="m-0">{{giveaway.name}}</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button v-on:click="showGiveaway(giveaway.id)" class="btn btn-outline-primary cust-btn-secondary p-2">
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
            console.dir(this.giveaways)
        },
        methods: {
            showGiveaway: function (id) {
                window.location = `/giveaways/${id}`;
            },
            createGiveaway: function () {
                window.location = '/giveaways/create';
            }
        },

    }
</script>