export const state = () => ({
    events: [],
    eventIds: []
})

export const getters = {
    events (state) {
        return state.events
    },
    eventIds (state) {
        return state.eventIds
    }
}

export const mutations = {
    PUSH_EVENT (state, event) {
        state.events.push(event)
        state.eventIds.push(event.id)
    },
    CLEAR_EVENTS (state) {
        state.events = []
        state.eventIds = []
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
