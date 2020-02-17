<template>
    <div>
        <header
            id="header"
            class="header-fixed"
        >
            <div class="container">
                <div
                    id="logo"
                    class="pull-left"
                >
                    <a
                        href="#intro"
                        class="scrollto"
                    ><img
                            src="/img/logo.png"
                            alt=""
                            title=""
                        ></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li>
                            <nuxt-link
                                to="/#intro"
                                style="text-decoration: none;"
                            >Home</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#about"
                                style="text-decoration: none;"
                            >About</nuxt-link>
                        </li>
                        <li class="menu-active">
                            <nuxt-link
                                to="/#events"
                                style="text-decoration: none;"
                            >Events</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#schedule"
                                style="text-decoration: none;"
                            >Schedule</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#venue"
                                style="text-decoration: none;"
                            >Venue</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#gallery"
                                style="text-decoration: none;"
                            >Gallery</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#supporters"
                                style="text-decoration: none;"
                            >Sponsors</nuxt-link>
                        </li>
                        <li>
                            <nuxt-link
                                to="/#contact"
                                style="text-decoration: none;"
                            >Contact</nuxt-link>
                        </li>
                        <li class="buy-tickets">
                            <a
                                v-b-modal.register-volunteer
                                href="#"
                                style="text-decoration: none;"
                            >Volunteer Registration</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main
            id="main"
            class="main-page"
        >
            <section
                id="speakers-details"
                class="wow fadeIn"
            >
                <div class="container">
                    <div class="section-header">
                        <h2>Event Details</h2>
                        <p>{{ event.category.name }}.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img
                                :src="`https://downloads.tesseractgnit.com/img/events/${event.photo}`"
                                alt="Speaker 1"
                                class="img-fluid"
                            >
                        </div>
                        <div class="col-md-6">
                            <div class="details">
                                <h2>{{ event.name }}</h2>
                                <!-- <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div> -->
                                <p>{{ event.description }}</p>
                                <h3 style="font-weight: bold;">Price : ₹ {{ event.price }} <span v-if="event.is_price_per_head">Per member</span></h3>
                                <h4 style="font-weight: bold;">Timing : {{ event.event_time }}</h4>
                                <div v-if="event.is_team">
                                    <h5>Minimum Members : {{ event.min_member }}</h5>
                                    <h5>Maximum Members : {{ event.max_member }}</h5>
                                </div>
                                <ul class="nav-menu">
                                    <li class="buy-tickets">
                                        <a
                                            :href="`https://downloads.tesseractgnit.com/events/${event.slug}/rules`"
                                            target="_blank"
                                        >View Rules</a>
                                    </li>
                                    <li class="buy-tickets">
                                        <a
                                            v-b-modal='`enroll-${event.category.slug}-${event.slug}-solo`'
                                            href="#"
                                            style="text-decoration: none;"
                                        >Enroll - Solo</a>
                                    </li>
                                    <li class="buy-tickets">
                                        <a
                                            v-if="event.is_team"
                                            v-b-modal='`enroll-${event.category.slug}-${event.slug}-team`'
                                            href="#"
                                            style="text-decoration: none;"
                                        >Enroll - Team</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <br>
                <br>
            </section>

        </main>

        <!--==========================
    Footer
  ============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-info">
                            <img
                                src="/img/logo.png"
                                alt="TheEvenet"
                            >
                            <p>Tesseract 2020 is here being bigger and better with a lot of newer events than the previous year. Get you hands dirty and start building your skills to showboat them in the celebration of technology at Guru Nanak Institute of Technology.</p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa fa-angle-right"></i> <a
                                        href="#"
                                        style="text-decoration: none;"
                                    >Register as Campuss Ambassador</a></li>
                                <!-- <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Speakers</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Schedule</a></li> -->
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <!-- <ul>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Venue</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Gallery</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Sponsors</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Contact</a></li>
                            </ul> -->
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                157/F, Nilgunj Road <br>
                                Sodepur, Kolkata-700114<br>
                                Kolkata <br>
                                <strong>Phone:</strong> +91 79807-27708 / 91-79807-63840<br>
                                <strong>Email:</strong> info@tesseractgnit.com<br>
                            </p>

                            <div class="social-links">
                                <a
                                    href="#"
                                    class="twitter"
                                ><i class="fa fa-twitter"></i></a>
                                <a
                                    href="#"
                                    class="facebook"
                                ><i class="fa fa-facebook"></i></a>
                                <a
                                    href="#"
                                    class="instagram"
                                ><i class="fa fa-instagram"></i></a>
                                <a
                                    href="#"
                                    class="google-plus"
                                ><i class="fa fa-google-plus"></i></a>
                                <a
                                    href="#"
                                    class="linkedin"
                                ><i class="fa fa-linkedin"></i></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright"> <strong>Tesseract</strong>- The GNIT TechFest.
                </div>
                <div class="credits">
                    Designed with <i class="fa fa-heart fa-beat text-danger"></i> by <a
                        href="https://www.thebuglabs.com"
                        target="_blank"
                    >The BugLabs</a>
                </div>
            </div>
        </footer><!-- #footer -->
        <a
            href="#"
            class="back-to-top"
        ><i class="fa fa-angle-up"></i></a>

        <b-modal
            :id="`enroll-${event.category.slug}-${event.slug}-solo`"
            hide-footer
        >
            <template v-slot:modal-title>
                Enroll Solo in {{ event.category.name }}/{{ event.name }}
            </template>
            <div class="d-block">
                <b-alert
                    variant="success"
                    show
                    v-if="isSuccess"
                >Hey {{ successData.name }}, thanks for applying! We will contact you soon! </b-alert>
                <div v-else>
                    <p>Fill in the fields below to complete your registration!</p>
                    <b-form @submit.prevent="campusAmbassadorSubmit">
                        <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                            description="We'll never share your email with anyone else."
                        >
                            <b-form-input
                                id="input-1"
                                v-model="campusAmbassadorForm.email"
                                type="email"
                                :class="{'is-invalid': errors.email}"
                                required
                                placeholder="you@domain.com"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.email"
                            >{{ errors.email[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-2"
                            label="Your Name:"
                            label-for="input-2"
                        >
                            <b-form-input
                                id="input-2"
                                v-model="campusAmbassadorForm.name"
                                :class="{'is-invalid': errors.name}"
                                required
                                placeholder="Enter name"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.name"
                            >{{ errors.name[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-3"
                            label="College name:"
                            label-for="input-3"
                        >
                            <b-form-input
                                id="input-3"
                                v-model="campusAmbassadorForm.college_name"
                                :class="{'is-invalid': errors.college_name}"
                                required
                                placeholder="Guru Nanak Institute of Technology"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.college_name"
                            >{{ errors.college_name[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-4"
                            label="Department:"
                            label-for="input-4"
                        >
                            <b-form-input
                                id="input-4"
                                v-model="campusAmbassadorForm.department"
                                :class="{'is-invalid': errors.department}"
                                required
                                placeholder="Computer Science"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.department"
                            >{{ errors.department[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-5"
                            label="Year:"
                            label-for="input-5"
                        >
                            <b-form-select
                                id="input-5"
                                v-model="campusAmbassadorForm.year"
                                :class="{'is-invalid': errors.year}"
                                :options="years"
                                required
                            ></b-form-select>
                            <div
                                class="invalid-feedback"
                                v-if="errors.year"
                            >{{ errors.year[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-6"
                            label="Phone number:"
                            label-for="input-6"
                        >
                            <b-form-input
                                id="input-6"
                                v-model="campusAmbassadorForm.phone"
                                :class="{'is-invalid': errors.phone}"
                                required
                                placeholder="9150656598"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.phone"
                            >{{ errors.phone[0] }}</div>
                        </b-form-group>

                        <b-button
                            type="submit"
                            variant="outline-success"
                            :disabled="isLoading"
                            pill
                            block
                        >
                            <span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>Submit</span></b-button>
                    </b-form>
                </div>
            </div>
        </b-modal>

        <b-modal
            :id="`enroll-${event.category.slug}-${event.slug}-team`"
            hide-footer
        >
            <template v-slot:modal-title>
                Enroll as a Team in {{ event.category.name }}/{{ event.name }}
            </template>
            <div class="d-block">
                <b-alert
                    variant="success"
                    show
                    v-if="isSuccess"
                >Hey {{ successData.name }}, thanks for applying! We will contact you soon! </b-alert>
                <div v-else>
                    <p>Fill in the fields below to complete your registration!</p>
                    <b-form @submit.prevent="campusAmbassadorSubmit">
                        <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                            description="We'll never share your email with anyone else."
                        >
                            <b-form-input
                                id="input-1"
                                v-model="campusAmbassadorForm.email"
                                type="email"
                                :class="{'is-invalid': errors.email}"
                                required
                                placeholder="you@domain.com"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.email"
                            >{{ errors.email[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-2"
                            label="Your Name:"
                            label-for="input-2"
                        >
                            <b-form-input
                                id="input-2"
                                v-model="campusAmbassadorForm.name"
                                :class="{'is-invalid': errors.name}"
                                required
                                placeholder="Enter name"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.name"
                            >{{ errors.name[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-3"
                            label="College name:"
                            label-for="input-3"
                        >
                            <b-form-input
                                id="input-3"
                                v-model="campusAmbassadorForm.college_name"
                                :class="{'is-invalid': errors.college_name}"
                                required
                                placeholder="Guru Nanak Institute of Technology"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.college_name"
                            >{{ errors.college_name[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-4"
                            label="Department:"
                            label-for="input-4"
                        >
                            <b-form-input
                                id="input-4"
                                v-model="campusAmbassadorForm.department"
                                :class="{'is-invalid': errors.department}"
                                required
                                placeholder="Computer Science"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.department"
                            >{{ errors.department[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-5"
                            label="Year:"
                            label-for="input-5"
                        >
                            <b-form-select
                                id="input-5"
                                v-model="campusAmbassadorForm.year"
                                :class="{'is-invalid': errors.year}"
                                :options="years"
                                required
                            ></b-form-select>
                            <div
                                class="invalid-feedback"
                                v-if="errors.year"
                            >{{ errors.year[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-6"
                            label="Phone number:"
                            label-for="input-6"
                        >
                            <b-form-input
                                id="input-6"
                                v-model="campusAmbassadorForm.phone"
                                :class="{'is-invalid': errors.phone}"
                                required
                                placeholder="9150656598"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.phone"
                            >{{ errors.phone[0] }}</div>
                        </b-form-group>

                        <b-button
                            type="submit"
                            variant="outline-success"
                            :disabled="isLoading"
                            pill
                            block
                        >
                            <span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>Submit</span></b-button>
                    </b-form>
                </div>
            </div>
        </b-modal>

    </div>
</template>

<script>
import axios from 'axios'

export default {
    data () {
        return {
            event: null,
            isLoading: false,
            campusAmbassadorForm: {
                email: '',
                college_name: '',
                name: '',
                phone: '',
                department: null,
                year: null,

            },
        }
    },
    async asyncData ({ app, params }) {
        const resp = await app.$axios.$get(`/events/${params.event}`)
        return {
            event: resp.event
        }
    },
    methods: {
        downloadRules (ruleName) {
            this.isLoading = true
            axios({
                url: `/downloads/${ruleName}`,
                method: 'GET',
                responseType: 'blob',
                headers: { 'Accept': 'application/pdf' }
            }).then((response) => {
                var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                var fileLink = document.createElement('a');

                fileLink.href = fileURL;
                fileLink.setAttribute('download', ruleName);
                console.log(fileLink)
                document.body.appendChild(fileLink);

                fileLink.click();

                window.setInterval(() => {
                    this.isLoading = false
                }, 5000);
            });
        }
    }
}
</script>

<style scoped>
.nav-menu li.buy-tickets a:hover {
  background: rgba(6, 12, 34, 0.98);
}
</style>