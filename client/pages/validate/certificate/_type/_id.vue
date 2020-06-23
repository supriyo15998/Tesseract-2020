<template>
    <h1>This certificate was awarded to {{ user.name }}</h1>
</template>

<script>
export default {
    data () {
        return {
            user: null
        }
    },
    async asyncData ({ app, params }) {
        const resp = await app.$axios.$get(`/validate/certificate/${params.type}/${params.id}`)
        return {
            user: resp.success.user,
        }
    },
}
</script>