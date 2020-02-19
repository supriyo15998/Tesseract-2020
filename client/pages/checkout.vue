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
                        <li>
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
                        <li class="menu-active">
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
                        <h2>Checkout</h2>
                        <p>Checkout form</p>
                    </div>
                    <div class="row">
                        {{ enrollTeamForm }}
                        <div
                            class="col-lg-12"
                            v-if="events && events.length > 0"
                        >
                            <b-form
                                @submit.prevent="enrollTeamFormSubmit()"
                                v-if="events[0].is_team"
                            >
                                <b-form-group
                                    id="input-group-team-name"
                                    label="Team Name:"
                                    label-for="team-name"
                                >
                                    <b-form-input
                                        id="team-name"
                                        v-model="enrollTeamForm.team.name"
                                        :class="{'is-invalid': errors.name}"
                                        required
                                        placeholder="Enter Team name"
                                    ></b-form-input>
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.name"
                                    >{{ errors.name[0] }}</div>
                                </b-form-group>
                                <h4>Team Leader Details</h4>
                                <b-form-group
                                    id="input-group-leader-name"
                                    label="Team Leader Name:"
                                    label-for="input-leader-name"
                                >
                                    <b-form-input
                                        id="input-leader-name"
                                        v-model="enrollTeamForm.leader.name"
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
                                    id="input-group-leader-email"
                                    label="Team Leader Email address:"
                                    label-for="input-leader-email"
                                    description="We'll never share your email with anyone else."
                                >
                                    <b-form-input
                                        id="input-leader-email"
                                        v-model="enrollTeamForm.leader.email"
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
                                    id="input-group-leader-phone"
                                    label="Team Leader Phone number:"
                                    label-for="input-leader-phone"
                                >
                                    <b-form-input
                                        id="input-leader-phone"
                                        v-model="enrollTeamForm.leader.phone"
                                        :class="{'is-invalid': errors.phone}"
                                        required
                                        placeholder="9150656598"
                                    ></b-form-input>
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.phone"
                                    >{{ errors.phone[0] }}</div>
                                </b-form-group>

                                <b-form-group
                                    id="input-group-leader-college"
                                    label="Team College name:"
                                    label-for="input-leader-college"
                                >
                                    <b-form-input
                                        id="input-leader-college"
                                        v-model="enrollTeamForm.leader.college"
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
                                    id="input-group-leader-year"
                                    label="Team Leader Year:"
                                    label-for="input-leader-year"
                                >
                                    <b-form-select
                                        id="input-leader-year"
                                        v-model="enrollTeamForm.leader.year"
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
                                    id="input-group-college-id"
                                    label="Team Leader College ID Number:"
                                    label-for="input-college-id"
                                >
                                    <b-form-input
                                        id="input-college-id"
                                        v-model="enrollTeamForm.leader.college_id"
                                        :class="{'is-invalid': errors.college_id}"
                                        required
                                        :disabled="this.user ? true : false"
                                        placeholder="GNIT/YYYY/XXXX"
                                    ></b-form-input>
                                    <p class="text-danger"><small>This ID needs to be produced at registration desk on event day</small></p>
                                    <div
                                        class="invalid-feedback"
                                        v-if="errors.college_id"
                                    >{{ errors.college_id[0] }}</div>
                                </b-form-group>

                                <div
                                    v-for="(n,i) in maxMembers"
                                    :key="i"
                                >
                                    <h4>Member {{ n }} Details</h4>
                                    <b-form-group
                                        :id="`input-group-email-${n}`"
                                        label="Email address:"
                                        :label-for="`input-email-${n}`"
                                        description="We'll never share your email with anyone else."
                                    >
                                        <b-form-input
                                            :id="`input-email-${n}`"
                                            v-model="enrollTeamForm.members[n-1].email"
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
                                        :id="`input-group-name-${n}`"
                                        label="Your Name:"
                                        :label-for="`input-name-${n}`"
                                    >
                                        <b-form-input
                                            :id="`input-name-${n}`"
                                            v-model="enrollTeamForm.members[n-1].name"
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
                                        :id="`input-group-college-name-${n}`"
                                        label="College name:"
                                        :label-for="`input-college-name-${n}`"
                                    >
                                        <b-form-input
                                            :id="`input-college-name-${n}`"
                                            v-model="enrollTeamForm.members[n-1].college"
                                            :class="{'is-invalid': errors.college}"
                                            required
                                            placeholder="Guru Nanak Institute of Technology"
                                        ></b-form-input>
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.college"
                                        >{{ errors.college[0] }}</div>
                                    </b-form-group>

                                    <b-form-group
                                        :id="`input-group-college-id-${n}`"
                                        label="College ID Number:"
                                        :label-for="`input-college-id-${n}`"
                                    >
                                        <b-form-input
                                            :id="`input-college-id-${n}`"
                                            v-model="enrollTeamForm.members[n-1].college_id"
                                            :class="{'is-invalid': errors.college_id}"
                                            required
                                            placeholder="GNIT/YYYY/XXXX"
                                        ></b-form-input>
                                        <p class="text-danger"><small>This ID needs to be produced at registration desk on event day</small></p>
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.college_id"
                                        >{{ errors.college_id[0] }}</div>
                                    </b-form-group>

                                    <b-form-group
                                        :id="`input-group-year-${n}`"
                                        label="Year:"
                                        :label-for="`input-year-${n}`"
                                    >
                                        <b-form-select
                                            :id="`input-year-${n}`"
                                            v-model="enrollTeamForm.members[n-1].year"
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
                                        :id="`input-group-phone-${n}`"
                                        label="Phone number:"
                                        :label-for="`input-phone-${n}`"
                                    >
                                        <b-form-input
                                            :id="`input-phobne-${n}`"
                                            v-model="enrollTeamForm.members[n-1].phone"
                                            :class="{'is-invalid': errors.phone}"
                                            required
                                            placeholder="9150656598"
                                        ></b-form-input>
                                        <div
                                            class="invalid-feedback"
                                            v-if="errors.phone"
                                        >{{ errors.phone[0] }}</div>
                                    </b-form-group>
                                </div>

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
                        <div
                            v-else
                            class="text-center col-lg-12"
                        >
                            <h3>Your cart is empty!</h3>
                            <ul class="nav-menu">
                                <li
                                    class="buy-tickets"
                                    style="width: 100%;"
                                >
                                    <nuxt-link to="/#events">Browse events</nuxt-link>
                                </li>
                            </ul>
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

    </div>
</template>

<script>
import axios from 'axios'

export default {
    data () {
        return {
            event: null,
            isLoading: false,
            isSuccess: false,
            enrollSoloForm: {
                name: '',
                email: '',
                college: '',
                phone: '',
                year: null,

            },
            enrollTeamForm: {
                team: {
                    name: ''
                },
                leader: {
                    name: '',
                    email: '',
                    college: '',
                    phone: '',
                    year: null,
                },
                members: [
                    {
                        name: '',
                        email: '',
                        college: '',
                        phone: '',
                        year: null,
                    },
                    {
                        name: '',
                        email: '',
                        college: '',
                        phone: '',
                        year: null,
                    },
                    {
                        name: '',
                        email: '',
                        college: '',
                        phone: '',
                        year: null,
                    },
                    {
                        name: '',
                        email: '',
                        college: '',
                        phone: '',
                        year: null,
                    }
                ],
                events: []
            },
            years: [{ text: 'Select One', value: null }, { text: 'First year', value: '1st' }, { text: 'Second Year', value: '2nd' }, { text: 'Third Year', value: '3rd' }, { text: 'Fourth Year', value: '4th' }],

        }
    },
    computed: {
        totalAmount () {
            let total = 0, discount = 0;

            this.events.forEach((e) => {
                total += e.price
            })

            if (this.eventIds.includes(6) && this.eventIds.includes(7) && this.eventIds.includes(5)) {
                discount = 100
            }

            else if ((this.eventIds.includes(8) && this.eventIds.includes(9)) || (this.eventIds.includes(8) && this.eventIds.includes(10)) || (this.eventIds.includes(9) && this.eventIds.includes(10))) {
                if (this.events.length === 2)
                    discount = 60
                else if (this.events.length === 3)
                    discount = 90
            }

            else if (this.eventIds.includes(8) && this.eventIds.includes(9) && this.eventIds.includes(10)) {
                discount = 40
            }

            return total - discount
        }
    },
    computed: {
        maxMembers () {
            let maxMembers = 0
            this.events.forEach((e) => {
                if (e.max_member > maxMembers)
                    maxMembers = e.max_member
            })
            return maxMembers - 1
        }
    },
    methods: {
        async enrollTeamFormSubmit () {
            this.isLoading = true
            this.enrollTeamForm.events = this.eventIds
            console.log(this.enrollTeamForm)
            await this.$axios.$post('/registration/event/team', this.enrollTeamForm)
                .then((res) => {
                    this.isLoading = false
                    console.log(res)
                })
                .catch((err) => {
                    this.isLoading = false
                    console.log(err)
                })
        },
        enrollSoloSubmit () {
            this.isLoading = true
            this.setUser(this.enrollSoloForm)
            this.pushEvent(this.event.id)

            window.setInterval(() => {
                this.isLoading = false
                this.isSuccess = true
            }, 2000)
        },
        removeFromCart (event) {
            this.isLoading = true
            this.removeEvent(event)

            window.setInterval(() => {
                this.isLoading = false
            }, 500)
        }
    }
}
</script>

<style scoped>
.nav-menu li.buy-tickets a {
    text-decoration: none;
}
.nav-menu li.buy-tickets a:hover {
  background: rgba(6, 12, 34, 0.98);
}

.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
</style>