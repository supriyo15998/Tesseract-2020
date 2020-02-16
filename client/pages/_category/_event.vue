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
                                :src="`https://api.tesseractgnit.com/img/events/${event.photo}`"
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
                                <h4 style="font-weight: bold;">Timing : {{ event.event_time }} <span v-if="event.is_price_per_head">Per head</span></h4>
                                <div v-if="event.is_team">
                                    <h5>Minimum Members : {{ event.min_member }}</h5>
                                    <h5>Maximum Members : {{ event.max_member }}</h5>
                                </div>
                                <button
                                    class="rules-btn"
                                    @click.prevent="downloadRules(event.rules)"
                                    :disabled="isLoading"
                                ><span v-if="isLoading"><i class="fa fa-spinner fa-spin"></i> Please wait</span> <span v-else>View Rules</span></b-button></button>
                                <a
                                    x
                                    href="#"
                                    style="text-decoration: none;"
                                    class="rules-btn"
                                >Enroll</a>
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
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@gnittesseract.in<br>
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
            isLoading: false
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

<style>
.rules-btn {
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
</style>