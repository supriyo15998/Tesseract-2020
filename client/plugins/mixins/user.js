import Vue from 'vue'
import { mapGetters, mapActions } from 'vuex'

const User = {
    install (Vue, options) {
        Vue.mixin({
            computed: {
                ...mapGetters({
                    user: 'user/user',
                })
            },
            methods: {
                ...mapActions({
                    setUser: 'user/setUser',
                    clearUser: 'user/clearUser'
                })
            }
        })
    }
}

Vue.use(User)
