<template>
    <div id="accordion">
        <accordion-component ref="accordion" v-for="(load,index) in loadList">
            <template #toggleBtn>
                <div class="card">
                    <div class="card-header" :id="'heading-'+index">
                        <h4 class="mb-0">
                            <button class="btn" @click="toggle(index)">
                                <span v-text="capitalize(load.dispatch_city.name)"></span>
                                <span>-</span>
                                <span v-text="capitalize(load.receiving_city.name)"></span>
                            </button>
                            <span class="float-right" v-text="load.volume+'т'"></span>
                        </h4>
                    </div>
                </div>
            </template>
            <template #content>
                <div class="faq-content" style="display: none">
                    <div class="card-body">
                        <div>
                            <h3 v-text="load.load_name"></h3>
                        </div>
                        <div>
                            <div><img :src="load.photo"></div>
                        </div>
                    </div>
                </div>
            </template>
        </accordion-component>
    </div>
</template>

<script>
    import AccordionComponent from './Support/AccordionComponent'

    export default {
        name: "LoadsComponent",
        components: { AccordionComponent },
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
                .listen('CreatedLoad', ({ load }) => {
                    this.addLoadsToList(load)
                })
        },
        methods: {
            addLoadsToList (load) {
                const loadObj = JSON.parse(load)
                if (load !== undefined && typeof loadObj == 'object') {
                    this.loadList.push(loadObj)
                }
            },
            capitalize: (string) => {
                if (typeof string !== 'string') return ''
                return string.charAt(0).toUpperCase() + string.slice(1)
            },
            toggle (itemIndex) {
                if (this.$el.children[itemIndex].classList.contains('open')) {
                    this.$el.children[itemIndex].classList.remove('open')
                    this.$el.children[itemIndex].querySelectorAll('.faq-content')[0].style.display = 'none'
                } else {
                    var prevFaqQuestion = this.$el.querySelectorAll('.open')
                    if (prevFaqQuestion.length !== 0) {
                        prevFaqQuestion[0].classList.remove('open')
                        prevFaqQuestion[0].querySelectorAll('.faq-content')[0].style.display = 'none'
                    }
                    this.$el.children[itemIndex].classList.add('open')
                    this.$el.children[itemIndex].querySelectorAll('.faq-content')[0].style.display = ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
