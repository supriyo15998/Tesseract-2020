export const state = () => ({
    events: []
})

export const getters = {
    events (state) {
        return state.events
    }
}

export const mutations = {
    PUSH_EVENT (state, event) {
        state.events.push(event)
    },
    CLEAR_EVENTS (state) {
        state.events = []
    }
}

export const actions = {
    pushEvent ({ commit }, event) {
        commit('PUSH_EVENT', event)
    },
    clearEvents ({ commit }) {
        commit('CLEAR_EVENTS')
    }
}
