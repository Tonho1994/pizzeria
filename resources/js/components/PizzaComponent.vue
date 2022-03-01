<template>
    <div class="container">
        <div class="col">
            <div class="card">
                <img :src="image_src" class="card-img-top figure-img img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ pizza.name }}</h5>
                    <p class="card-text">{{ pizza.ingredients }}.</p>
                    <p class="card-text"><small class="text-muted">${{ pizza.price }}</small></p>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary text-white" :href="routePedido" role="button">
                            Ordenar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            pizza: {
                type: Object,
            },
            routePedido:{
                type:String,
            }
        },
        data() {
            return {
                image_src: '/img/pizzas/'+this.pizza.foto
            };
        },
        mounted() {
            console.log("Pizza "+this.pizza.name+" mounted")
        },
        methods: {
        }
    }
</script>
