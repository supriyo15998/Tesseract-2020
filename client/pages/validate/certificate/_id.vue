<template>
    <b-card-text>
        <b-card class="text-center" overlay img-src="../../../static/img/bill_back.jpg" style="padding: 15%">
            <b-img src="../../../static/img/logo_dark.jpg" fluid alt="Responsive image"></b-img>
            <!-- <div class="bg-success text-light"> -->
                <!-- <b-img src="../../../static/tesseract_transparent_small.png" height="100" width="100" alt="Responsive image"></b-img> -->
                <h1>This certificate was awarded to {{ user.name }}</h1>
            <!-- </div> -->
        </b-card>
    </b-card-text>
</template>

<script>
export default {
    data () {
        return {
            user: null
        }
    },
    async asyncData ({ app, params }) {
        const resp = await app.$axios.$get(`/validate/certificate/${params.id}`)
        return {
            user: resp.success.user,
        }
    },
}
</script>