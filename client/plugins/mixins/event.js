import Vue from 'vue'
import { mapGetters, mapActions } from 'vuex'

const Event = {
    install (Vue, options) {
        Vue.mixin({
            computed: {
                ...mapGetters({
                    events: 'event/events',
                })
            },
            methods: {
                ...mapActions({
                    pushEvent: 'event/pushEvent',
                    clearEvents: 'event/clearEvents'
                })
            }
        })
    }
}

Vue.use(Event)
