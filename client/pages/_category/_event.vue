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
                        <li>
                            <nuxt-link
                                to="/cart"
                                style="text-decoration: none;"
                            >Cart</nuxt-link>
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
                        <div class="col-md-5">
                            <img
                                :src="`https://downloads.tesseractgnit.com/img/events/${event.photo}`"
                                alt="Speaker 1"
                                class="img-fluid"
                            >
                        </div>
                        <div class="col-md-7">
                            <div class="details">
                                <h2>{{ event.name }}</h2>
                                <!-- <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div> -->
                                <p>{{ event.description }}</p>
                                <b-alert
                                    variant="warning"
                                    show
                                    class="text-center"
                                    v-if="event.id === 18"
                                >
                                    <h6>Note:</h6>
                                    <p>This event is exclusively for Guru Nanak Institute of Technology Students. <br><small>Registrations Closed!</small></p>
                                </b-alert>
                                <h3 style="font-weight: bold;">Price : ₹ {{ event.price }} <span v-if="event.is_price_per_head">Per member</span></h3>
                                <h4 style="font-weight: bold;">Timing : {{ event.event_time }}</h4>
                                <div v-if="event.is_team">
                                    <h5>Minimum Members : {{ event.min_member }}</h5>
                                    <h5>Maximum Members : {{ event.max_member }}</h5>
                                </div>
                                <p
                                    v-if="events.length > 0 && events[0].category.id !== event.category.id"
                                    class="text-danger"
                                >You cannot enroll in this event as this category differs from an event already in your cart! Please checkout and re-enroll with events in this category!</p>

                                <p
                                    v-if="events.length > 0 && events[0].is_team !== event.is_team"
                                    class="text-danger"
                                >You cannot enroll in this event as you have an event in your cart which requires solo registration while this event requires team registration. Please checkout and re-enroll in this event as a team!</p>
                                <ul class="nav-menu">
                                    <li class="buy-tickets">
                                        <a
                                            :href="`https://downloads.tesseractgnit.com/events/${event.slug}/rules`"
                                            target="_blank"
                                        >View Rules</a>
                                    </li>
                                    <li
                                        class="buy-tickets"
                                        :class="{'is-hidden': (events.length > 0 && events[0].category.id !== event.category.id) || (events.length > 0 && events[0].is_team !== event.is_team),}"
                                    >
                                        <button
                                            @click.prevent="addToCart()"
                                            href="#"
                                            style="text-decoration: none;"
                                            v-if="!eventIds.includes(event.id)"
                                            :disabled="isLoading"
                                        ><span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>Enroll</span></button>
                                        <button
                                            @click.prevent="removeFromCart()"
                                            href="#"
                                            style="text-decoration: none;"
                                            v-else
                                            :disabled="isLoading"
                                        ><span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>Remove from Cart</span></button>
                                    </li>
                                    <li
                                        class="buy-tickets"
                                        v-if="eventIds.includes(event.id)"
                                        :class="{'is-hidden': isLoading}"
                                    >
                                        <nuxt-link to="/#events">More events</nuxt-link>
                                    </li>
                                    <li
                                        class="buy-tickets"
                                        v-if="events.length > 0"
                                        :class="{'is-hidden': isLoading}"
                                    >
                                        <nuxt-link to="/cart">Checkout</nuxt-link>
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
            <section
                id="events"
                class="wow fadeInUp"
                v-if="similar.length > 0"
            >
                <div class="container">
                    <div class="section-header">
                        <h2>Similar Events</h2>
                        <p>Similar events of the same category</p>
                    </div>
                    <div class="row">
                        <div
                            class="col-lg-4 col-md-6"
                            v-for="event in similar"
                            :key="event.id"
                        >
                            <div class="speaker">
                                <img
                                    :src="`https://downloads.tesseractgnit.com/img/events/${event.photo}`"
                                    alt="Speaker 1"
                                    class="img-fluid"
                                >
                                <div class="details">
                                    <h3>
                                        <nuxt-link
                                            :to="`/${event.category.slug}/${event.slug}`"
                                            style="text-decoration: none"
                                        >{{ event.name }}</nuxt-link>
                                    </h3>
                                    <p>{{ event.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <!-- <li><i class="fa fa-angle-right"></i> <a
                                        href="#"
                                        style="text-decoration: none;"
                                    >Register as Campuss Ambassador</a></li> -->
                                <li><i class="fa fa-angle-right"></i> <a
                                        href="https://gnit.ac.in"
                                        target="_blank"
                                        style="text-decoration: none;"
                                    >GNIT</a></li>
                                <!-- <li><i class="fa fa-angle-right"></i> <a href="#">Speakers</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Schedule</a></li> -->
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa fa-angle-right"></i> <a
                                        href="https://jisgroup.org"
                                        target="_blank"
                                        style="text-decoration: none;"
                                    >JIS GROUP</a></li>
                                <!-- <li><i class="fa fa-angle-right"></i> <a href="#">Gallery</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Sponsors</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="#">Contact</a></li> -->
                            </ul>
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
                <div v-if="eventIds.includes(this.event.id) && !this.isSuccess && !this.isLoading">
                    <b-alert
                        variant="warning"
                        show
                    >You have already enrolled in this event! </b-alert>
                    <ul class="nav-menu pull-right">
                        <li class="buy-tickets">
                            <nuxt-link to="/#events">Browse other events</nuxt-link>
                        </li>
                        <li class="buy-tickets">
                            <nuxt-link to="/cart">Checkout</nuxt-link>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <div v-if="isSuccess">
                        <b-alert
                            variant="success"
                            show
                            v-if="isSuccess"
                        >{{ event.name }} has been successfully added to your cart! Please look into more events or Checkout! </b-alert>
                        <ul class="nav-menu pull-right">
                            <li class="buy-tickets">
                                <nuxt-link to="/#events">Browse other events</nuxt-link>
                            </li>
                            <li class="buy-tickets">
                                <nuxt-link to="/cart">Checkout</nuxt-link>
                            </li>
                        </ul>
                    </div>
                    <div v-else>
                        <p>Fill in the fields below to complete your registration! {{ user }}</p>
                        <b-form @submit.prevent="enrollSoloSubmit">
                            <b-form-group
                                id="input-group-1"
                                label="Email address:"
                                label-for="input-1"
                                description="We'll never share your email with anyone else."
                            >
                                <b-form-input
                                    id="input-1"
                                    v-model="enrollSoloForm.email"
                                    type="email"
                                    :class="{'is-invalid': errors.email}"
                                    required
                                    :disabled="user ? true : false"
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
                                    v-model="enrollSoloForm.name"
                                    :class="{'is-invalid': errors.name}"
                                    required
                                    :disabled="this.user ? true : false"
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
                                    v-model="enrollSoloForm.college"
                                    :class="{'is-invalid': errors.college}"
                                    required
                                    :disabled="this.user ? true : false"
                                    placeholder="Guru Nanak Institute of Technology"
                                ></b-form-input>
                                <div
                                    class="invalid-feedback"
                                    v-if="errors.college"
                                >{{ errors.college[0] }}</div>
                            </b-form-group>

                            <b-form-group
                                id="input-group-3"
                                label="College ID Number:"
                                label-for="input-3"
                            >
                                <b-form-input
                                    id="input-3"
                                    v-model="enrollSoloForm.college_id"
                                    :class="{'is-invalid': errors.college_id}"
                                    required
                                    :disabled="this.user ? true : false"
                                    placeholder="GNIT/YYYY/XXXX"
                                ></b-form-input>
                                <div
                                    class="invalid-feedback"
                                    v-if="errors.college_id"
                                >{{ errors.college_id[0] }}</div>
                            </b-form-group>

                            <b-form-group
                                id="input-group-5"
                                label="Year:"
                                label-for="input-5"
                            >
                                <b-form-select
                                    id="input-5"
                                    v-model="enrollSoloForm.year"
                                    :class="{'is-invalid': errors.year}"
                                    :options="years"
                                    required
                                    :disabled="this.user ? true : false"
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
                                    v-model="enrollSoloForm.phone"
                                    :class="{'is-invalid': errors.phone}"
                                    required
                                    :disabled="this.user ? true : false"
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
                >{{ event.name }} has been successfully added to your cart! Please look into more events or Checkout! </b-alert>
                <div v-else>
                    <p>Fill in the fields below to complete your registration! {{ user }}</p>
                    <b-form @submit.prevent="campusAmbassadorSubmit">
                        <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                            description="We'll never share your email with anyone else."
                        >
                            <b-form-input
                                id="input-1"
                                v-model="enrollSoloForm.email"
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
                                v-model="enrollSoloForm.name"
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
                                v-model="enrollSoloForm.college"
                                :class="{'is-invalid': errors.college}"
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
                                v-model="enrollSoloForm.department"
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
                                v-model="enrollSoloForm.year"
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
                                v-model="enrollSoloForm.phone"
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
            similar: [],
            isLoading: false,
            isSuccess: false,
            enrollSoloForm: {
                name: this.user ? this.user.email : 'ABCD1234',
                email: '',
                college: '',
                phone: '',
                year: null,

            },
            years: [{ text: 'Select One', value: null }, { text: 'First year', value: '1st' }, { text: 'Second Year', value: '2nd' }, { text: 'Third Year', value: '3rd' }, { text: 'Fourth Year', value: '4th' }],

        }
    },
    async asyncData ({ app, params }) {
        const resp = await app.$axios.$get(`/events/${params.event}`)
        return {
            event: resp.event,
            similar: resp.similar
        }
    },
    methods: {
        addToCart () {
            this.isLoading = true
            //this.setUser(this.enrollSoloForm)
            this.pushEvent(this.event)

            window.setInterval(() => {
                this.isLoading = false
                this.isSuccess = true
            }, 2000)
        },
        removeFromCart () {
            this.isLoading = true
            this.removeEvent(this.event)

            window.setInterval(() => {
                this.isLoading = false
            }, 2000)
        }
    },
}
</script>

<style scoped>
.is-hidden {
    display: none;
}

.nav-menu li.buy-tickets a {
    text-decoration: none;
}
.nav-menu li.buy-tickets a:hover {
  background: rgba(6, 12, 34, 0.98);
}

.nav-menu li.buy-tickets button {
  color: #fff;
  background: #f82249;
  padding: 7px 22px;
  border-radius: 50px;
  border: 2px solid #f82249;
  transition: all ease-in-out 0.3s;
  font-weight: 500;
  margin-left: 8px;
  margin-top: 2px;
  line-height: 1;
  font-size: 13px;
}

.nav-menu li.buy-tickets button:hover {
  background: rgba(6, 12, 34, 0.98);
}

.nav-menu li.buy-tickets:hover button:before,
.nav-menu li.buy-tickets.menu-active button:before {
  visibility: hidden;
}

</style>