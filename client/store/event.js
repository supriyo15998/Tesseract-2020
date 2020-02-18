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
    },
    REMOVE_EVENT(state, event) {
        state.events.forEach((e, i) => {
            if (e.id === event.id)
                state.events.splice(i, 1)
        })

        state.eventIds.forEach((e, i) => {
            if (e === event.id)
                state.eventIds.splice(i, 1)
        })
    }
}

export const actions = {
    pushEvent ({ commit }, event) {
        commit('PUSH_EVENT', event)
    },
    clearEvents ({ commit }) {
        commit('CLEAR_EVENTS')
    },
    removeEvent({ commit }, event) {
        commit('REMOVE_EVENT', event)
    }
}
