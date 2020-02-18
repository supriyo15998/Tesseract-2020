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
                        <p>Cart Details</p>
                    </div>
                    <div class="row">
                        <div
                            v-if="events && events.length > 0"
                            style="width: 100%;"
                        >
                            <table
                                id="cart"
                                class="table table-hover table-condensed"
                            >
                                <thead>
                                    <tr>
                                        <th style="width:70%">Product</th>
                                        <th style="width:20%">Price</th>
                                        <th colspan="2"></th>
                                        <th style="width:10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="event in events"
                                        :key="event.id"
                                    >
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <h6 class="nomargin">{{ event.name }}</h6>
                                                    <p style="font-size: 13px;">{{ event.description }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">₹{{ event.price }}</td>
                                        <td colspan="2"></td>
                                        <td
                                            class="actions"
                                            data-th=""
                                        >
                                            <button
                                                class="btn btn-danger btn-sm"
                                                :disabled="isLoading"
                                                @click.prevent="removeFromCart(event)"
                                            ><i
                                                    class="fa fa-spinner fa-spin"
                                                    v-if="isLoading"
                                                ></i><i
                                                    class="fa fa-trash-o"
                                                    v-else
                                                ></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="visible-xs">
                                        <td colspan="1"></td>
                                        <td><strong>Total ₹{{ totalAmount }}</strong></td>
                                        <td
                                            colspan="3"
                                            class="hidden-xs"
                                        ></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul class="nav-menu">
                                                <li
                                                    class="buy-tickets"
                                                    style="width: 100%;"
                                                >
                                                    <nuxt-link to="/#events"><i class="fa fa-angle-left"></i> Browse events</nuxt-link>
                                                </li>
                                            </ul>
                                        </td>
                                        <td
                                            colspan="2"
                                            class="hidden-xs"
                                        ></td>
                                        <td class="hidden-xs text-center"><strong>Total ₹{{ totalAmount }}</strong></td>
                                        <td>
                                            <ul class="nav-menu">
                                                <li
                                                    class="buy-tickets"
                                                    style="width: 100%;"
                                                >
                                                    <nuxt-link
                                                        to="/checkout"
                                                        style="background-color: #28a745 !important; border-color: #28a745 !important;"
                                                    >Checkout <i class="fa fa-angle-right"></i> </nuxt-link>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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
    methods: {
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