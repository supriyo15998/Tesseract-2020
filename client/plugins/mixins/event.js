import Vue from 'vue'
import { mapGetters, mapActions } from 'vuex'

const Event = {
    install (Vue, options) {
        Vue.mixin({
            computed: {
                ...mapGetters({
                    events: 'event/events',
                    eventIds: 'event/eventIds',
                })
            },
            methods: {
                ...mapActions({
                    pushEvent: 'event/pushEvent',
                    removeEvent: 'event/removeEvent',
                    clearEvents: 'event/clearEvents'
                })
            }
        })
    }
}

Vue.use(Event)
