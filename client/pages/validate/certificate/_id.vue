<template>
    <div
        class="text-center"
        style="border: 1px dashed; margin: 5%;padding: 10%; padding-bottom: 5%; padding-top: 5%;"
    >
        <img src="@/static/img/logo_dark.jpg" />
        <p class="lead">This certificate was awarded to</p>
        <h1 class="display-3">{{ user.name }}</h1>
        <p class="lead">Verified by Team Tesseract - <b>Guru Nanak Institute of Technology</b></p>
        <p class="lead">For more information please contact <a href="mailto:admin@tesseractgnit.com"><b>admin@tesseractgnit.com</b></a></p>
        <!-- <b-jumbotron>

            <template v-slot:header><span style="position: absolute; margin-top: 2%;">{{ user.name }}</span></template>

            <template v-slot:lead>
                This certificate was awarded to
            </template>

            <p style="position: absolute; right: 5%;">Validated by the Tesseract GNIT Team</p>
        </b-jumbotron> -->
    </div>
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