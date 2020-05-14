<template>
    <div id="accordion">
        <div class="card" v-for="(load,index) in loadList">
            <div class="card-header" :id="'heading-'+index">
                <h4 class="mb-0">
                    <button class="btn"
                            data-toggle="collapse"
                            :data-target="'#collapse'+index"
                            aria-expanded="false" :aria-controls="'collapse'+index">
                        <span v-text="capitalize(load.dispatch_city.dispatch_city_name)"></span>
                        <span>-</span>
                        <span v-text="capitalize(load.receiving_city.receiving_city_name)"></span>
                    </button>
                    <span class="float-right" v-text="load.volume"></span>
                </h4>
            </div>

            <div :id="'collapse'+index" class="collapse" :aria-labelledby="'heading-'+index" data-parent="#accordion">
                <div class="card-body">
                    <div>
                        <h3 v-text="load.load_name"></h3>
                    </div>
                    <div>
                        <div><img :src="load.photo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoadsComponent",
        data () {
            return {
                loadList: []
            }
        },
        props: {
            loads: {
                type: Array,
                required: true
            },
        },
        mounted () {
            this.loadList = this.loads

            window.Echo.channel('birza_vantaziv_database_load-channel')
                .listen('CreatedLoad', ({ loads }) => {
                    this.addLoadsToList(loads.target)
                })
        },
        methods: {
            addLoadsToList (loads) {
                if (loads !== undefined && typeof loads == 'object') {
                    loads.forEach(item => {
                        this.loadList.push(item)
                    })
                }
            },
            capitalize: (string) => {
                if (typeof string !== 'string') return ''
                return string.charAt(0).toUpperCase() + string.slice(1)
            }
        }
    }
</script>

<style scoped>

</style>
