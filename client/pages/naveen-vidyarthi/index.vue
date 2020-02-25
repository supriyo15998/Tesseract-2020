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
                        <h2>Naveen Vidyarthi Award</h2>
                        <p>The GNIT In-House event for First Year Students! </p>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img
                                src="img/posters/naveen_vidyarthi_compressed.jpg"
                                alt="Speaker 1"
                                class="img-fluid"
                            >
                        </div>
                        <div class="col-md-7">
                            <div class="details">
                                <h2>Naveen Vidyarthi Award</h2>
                                <!-- <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div> -->
                                <p>Each participating team must participate in two mandatory events (<b>Model Display</b> and <b>Poster Presentation</b>), and maximum <b>three</b> optional events. Each event holds some points (refer the table below). Highest point earning team will win the award.</p>
                                <h2 class="text-center">Point Table</h2>
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Event</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Model Display <b>(Mandatory)</b></td>
                                            <td>550</td>
                                        </tr>
                                        <tr>
                                            <td>Poster Presentation <b>(Mandatory)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Photography <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Tech quiz + Debate <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Chess <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Any Gaming <b>(Optional)</b></td>
                                            <td>150</td>
                                        </tr>
                                        <tr>
                                            <td>Any Coding Event <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Any Robotics Event <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Short Film <b>(Optional)</b></td>
                                            <td>100</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div>
                                    <h5>Minimum Members : 4</h5>
                                    <h5>Maximum Members : 6</h5>
                                </div>
                                <p
                                    v-if="events.length > 0 && events[0].category.id !== 'naveen-vidyarthi'"
                                    class="text-danger"
                                >You cannot enroll in this event as this category differs from an event already in your cart! Please checkout and re-enroll with events in this category!</p>

                                <p
                                    v-if="events.length > 0 && events[0].is_team !== 1"
                                    class="text-danger"
                                >You cannot enroll in this event as you have an event in your cart which requires solo registration while this event requires team registration. Please checkout and re-enroll in this event as a team!</p>
                                <ul class="nav-menu">
                                    <li class="buy-tickets">
                                        <a
                                            :href="`https://downloads.tesseractgnit.com/events/naveen-vidyarthi/rules`"
                                            target="_blank"
                                        >View Rules</a>
                                    </li>
                                    <li
                                        class="buy-tickets"
                                        :class="{'is-hidden': (events.length > 0 && events[0].category.id !== 'naveen-vidyarthi') || (events.length > 0 && events[0].is_team !== 1),}"
                                    >
                                        <nuxt-link
                                            to="/naveen-vidyarthi/checkout"
                                            style="text-decoration: none;"
                                            :disabled="isLoading"
                                        ><span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>Enroll</span></nuxt-link>
                                    </li>
                                    <li
                                        class="buy-tickets"
                                        v-if="eventIds.includes(0)"
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