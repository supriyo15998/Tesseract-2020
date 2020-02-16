<template>
    <div>
        <header id="header">
            <div class="container">
                <div
                    id="logo"
                    class="pull-left"
                >
                    <a
                        href="#intro"
                        class="scrollto"
                    ><img
                            src="img/logo.png"
                            alt=""
                            title=""
                        ></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a
                                href="#intro"
                                style="text-decoration: none;"
                            >Home</a></li>
                        <li><a
                                href="#about"
                                style="text-decoration: none;"
                            >About</a></li>
                        <li><a
                                href="#events"
                                style="text-decoration: none;"
                            >Events</a></li>
                        <li><a
                                href="#schedule"
                                style="text-decoration: none;"
                            >Schedule</a></li>
                        <li><a
                                href="#venue"
                                style="text-decoration: none;"
                            >Venue</a></li>
                        <li><a
                                href="#gallery"
                                style="text-decoration: none;"
                            >Gallery</a></li>
                        <li><a
                                href="#supporters"
                                style="text-decoration: none;"
                            >Sponsors</a></li>
                        <li><a
                                href="#contact"
                                style="text-decoration: none;"
                            >Contact</a></li>
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
        <section id="intro">
            <div class="intro-container wow fadeIn">
                <h1 class="mb-4 pb-0">Tesseract<br>The Annual <span>Tech Fest</span> of <span>GNIT</span></h1>
                <h2 class="mb-4 pb-0">
                    <div
                        id="days"
                        style="display: inline;"
                    ></div> <span>Days</span>
                    <div
                        id="hours"
                        style="display: inline;"
                    ></div> <span>Hours</span>
                    <div
                        id="mins"
                        style="display: inline;"
                    ></div> <span>Minutes</span>
                    <div
                        id="secs"
                        style="display: inline;"
                    ></div> <span>Seconds</span>
                </h2>
                <p class="mb-4 pb-0">13-14 March, Guru Nanak Institute of Technology, Kolkata</p>
                <a
                    href="https://www.youtube.com/watch?v=USIeXaPdwuQ"
                    class="venobox play-btn mb-4"
                    data-vbtype="video"
                    data-autoplay="true"
                ></a>
                <a
                    href="#"
                    class="about-btn add-button"
                >Download the App</a>
                <a
                    v-b-modal.register-volunteer
                    href="#"
                    style="text-decoration: none;"
                    class="about-btn"
                >Volunteer Registration</a>
                <a
                    v-b-modal.register-campus-ambassador
                    href="#"
                    class="about-btn"
                    style="text-decoration: none"
                >Campus Ambassador Registration</a>
            </div>
        </section>
        <main id="main">
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>About The Event</h2>
                            <p>Tesseract 2020 is here being bigger and better with a lot of newer events than the previous year. Get your hands dirty and start building your skills to showboat them in the celebration of technology at Guru Nanak Institute of Technology.</p>
                        </div>
                        <div class="col-lg-3">
                            <h3>Where</h3>
                            <p>157/F, Nilgunj Road, Sodepur<br>Kolkata - 700114</p>
                        </div>
                        <div class="col-lg-3">
                            <h3>When</h3>
                            <p>Friday and Saturday<br>13-14 March</p>
                        </div>
                    </div>
                </div>
            </section>
            <section
                id="events"
                class="wow fadeInUp"
            >
                <div class="container">
                    <div class="section-header">
                        <h2>Event List</h2>
                        <p>Here are some of our events</p>
                    </div>
                    <div
                        class="row"
                        v-for="category in computedCategories"
                        :key="category.id"
                    >
                        <div class="col-lg-12 col-md-6 text-center">
                            <h2>{{ category.name }}</h2>
                        </div>

                        <div
                            class="col-lg-4 col-md-6"
                            v-for="event in category.events"
                            :key="event.id"
                        >
                            <div class="speaker">
                                <img
                                    :src="`https://api.tesseractgnit.com/img/events/${event.photo}`"
                                    alt="Speaker 1"
                                    class="img-fluid"
                                >
                                <div class="details">
                                    <h3>
                                        <nuxt-link
                                            :to="`/${category.slug}/${event.slug}`"
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

            <!--==========================
      Schedule Section
    ============================-->
            <section
                id="schedule"
                class="section-with-bg"
            >
                <div class="container wow fadeInUp">
                    <div class="section-header">
                        <h2>Event Schedule</h2>
                        <p>Here is our event schedule</p>
                    </div>

                    <div class="col-lg-12 col-md-6 text-center">
                        <h2>Coming Soon..</h2>
                    </div>

                    <!-- <ul
                        class="nav nav-tabs"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                href="#day-1"
                                role="tab"
                                data-toggle="tab"
                            >Day 1</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#day-2"
                                role="tab"
                                data-toggle="tab"
                            >Day 2</a>
                        </li>
                    </ul>

                    <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
                        necessitatibus voluptatem quis labore perspiciatis quia.</h3>

                    <div class="tab-content row justify-content-center"> -->

                    <!-- Schdule Day 1 -->
                    <!-- <div
                            role="tabpanel"
                            class="col-lg-9 tab-pane fade show active"
                            id="day-1"
                        >

                            <div class="row schedule-item">
                                <div class="col-md-2"><time>09:30 AM</time></div>
                                <div class="col-md-10">
                                    <h4>Registration</h4>
                                    <p>Fugit voluptas iusto maiores temporibus autem numquam magnam.</p>
                                </div>
                            </div>

                            <div class="row schedule-item">
                                <div class="col-md-2"><time>10:00 AM</time></div>
                                <div class="col-md-10">
                                    <div class="speaker">
                                        <img
                                            src="img/speakers/1.jpg"
                                            alt="Brenden Legros"
                                        >
                                    </div>
                                    <h4>Keynote <span>Brenden Legros</span></h4>
                                    <p>Facere provident incidunt quos voluptas.</p>
                                </div>
                            </div>

                        </div> -->
                    <!-- End Schdule Day 1 -->

                    <!-- Schdule Day 2 -->
                    <!-- <div
                            role="tabpanel"
                            class="col-lg-9  tab-pane fade"
                            id="day-2"
                        >

                            <div class="row schedule-item">
                                <div class="col-md-2"><time>10:00 AM</time></div>
                                <div class="col-md-10">
                                    <div class="speaker">
                                        <img
                                            src="img/speakers/1.jpg"
                                            alt="Brenden Legros"
                                        >
                                    </div>
                                    <h4>Libero corrupti explicabo itaque. <span>Brenden Legros</span></h4>
                                    <p>Facere provident incidunt quos voluptas.</p>
                                </div>
                            </div>
                        </div> -->
                    <!-- End Schdule Day 2 -->

                    <!--</div> -->

                </div>

            </section>

            <!--==========================
      Venue Section
    ============================-->
            <section
                id="venue"
                class="wow fadeInUp"
            >

                <div class="container-fluid">

                    <div class="section-header">
                        <h2>Event Venue</h2>
                        <p>Event venue location info and gallery</p>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-lg-6 venue-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.8899592364214!2d88.37663591438134!3d22.695139985119937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89c6df041e831%3A0x6e3fc1531d1cb33!2sGuru%20Nanak%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1579894782980!5m2!1sen!2sin"
                                width="800"
                                height="600"
                                frameborder="0"
                                style="border:0;"
                                allowfullscreen=""
                            ></iframe>
                        </div>

                        <div class="col-lg-6 venue-info">
                            <div class="row justify-content-center">
                                <div class="col-11 col-lg-8">
                                    <h3>Guru Nanak Institute of Technology, Kolkata</h3>
                                    <p>The Guru Nanak Institute of Technology is one of the top private engineering colleges in West Bengal, situated at Panihati, Kolkata, established in 2003.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-fluid venue-gallery-container">
                    <div class="row no-gutters">

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/1-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/1-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/n3-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/n3-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/hack1-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/hack1-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/14-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/14-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/check-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/check-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/7-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/7-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/n6-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/n6-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/n7-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/n7-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="venue-gallery">
                                <a
                                    href="img/venue-gallery/8-min.jpg"
                                    class="venobox"
                                    data-gall="venue-gallery"
                                >
                                    <img
                                        src="img/venue-gallery/8-min.jpg"
                                        alt=""
                                        class="img-fluid"
                                    >
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

            <!--==========================
      Gallery Section
    ============================-->
            <section
                id="gallery"
                class="wow fadeInUp"
            >

                <div class="container">
                    <div class="section-header">
                        <h2>Gallery</h2>
                        <p>Previous year gallery</p>
                    </div>
                </div>

                <!-- <div class="col-lg-12 col-md-6 text-center">
                    <h2>Coming Soon..</h2>
                </div> -->

                <div class="owl-carousel gallery-carousel">
                    <a
                        href="img/gallery/1-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/1-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/2-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/2-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/3-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/3-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/4-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/4-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/5-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/5-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/6-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/6-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/7-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/7-min.jpg"
                            alt=""
                        ></a>
                    <a
                        href="img/gallery/8-min.jpg"
                        class="venobox"
                        data-gall="gallery-carousel"
                    ><img
                            src="img/gallery/8-min.jpg"
                            alt=""
                        ></a>
                </div>

            </section>

            <!--==========================
      Sponsors Section
    ============================-->
            <section
                id="supporters"
                class="section-with-bg wow fadeInUp"
            >

                <div class="container">
                    <div class="section-header">
                        <h2>Sponsors</h2>
                    </div>

                    <div class="col-lg-12 col-md-6 text-center">
                        <h2>Coming Soon..</h2>
                    </div>

                    <!-- <div class="row no-gutters supporters-wrap clearfix">

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/1.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/2.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/3.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/4.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/5.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/6.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/7.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="supporter-logo">
                                <img
                                    src="img/supporters/8.png"
                                    class="img-fluid"
                                    alt=""
                                >
                            </div>
                        </div>

                    </div> -->

                </div>

            </section>

            <!--==========================
      F.A.Q Section
    ============================-->
            <!-- <section
                id="faq"
                class="wow fadeInUp"
            >

                <div class="container">

                    <div class="section-header">
                        <h2>F.A.Q </h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <ul id="faq-list">

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        class="collapsed"
                                        href="#faq1"
                                    >Non consectetur a erat nam at lectus urna duis? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq1"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        href="#faq2"
                                        class="collapsed"
                                    >Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq2"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        href="#faq3"
                                        class="collapsed"
                                    >Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq3"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        href="#faq4"
                                        class="collapsed"
                                    >Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq4"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        href="#faq5"
                                        class="collapsed"
                                    >Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq5"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a
                                        data-toggle="collapse"
                                        href="#faq6"
                                        class="collapsed"
                                    >Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="fa fa-minus-circle"></i></a>
                                    <div
                                        id="faq6"
                                        class="collapse"
                                        data-parent="#faq-list"
                                    >
                                        <p>
                                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </section> -->

            <!--==========================
      Contact Section
    ============================-->
            <section
                id="contact"
                class="section-bg wow fadeInUp"
            >

                <div class="container">

                    <div class="section-header">
                        <h2>Contact Us</h2>
                        <p>Have queries? We are here to help! Just drop in a message.</p>
                    </div>

                    <div class="row contact-info">

                        <div class="col-md-4">
                            <div class="contact-address">
                                <i class="ion-ios-location-outline"></i>
                                <h3>Address</h3>
                                <address>157/F, Nilgunj Road, Sodepur, Kolkata - 700114</address>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="contact-phone">
                                <i class="ion-ios-telephone-outline"></i>
                                <h3>Phone Number</h3>
                                <p><a href="#">+91-79807-27708 / +91-79807-63840</a></p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="contact-email">
                                <i class="ion-ios-email-outline"></i>
                                <h3>Email</h3>
                                <p><a href="mailto:info@example.com">info@tesseractgnit.com</a></p>
                            </div>
                        </div>

                    </div>

                    <div class="form">
                        <form
                            action=""
                            method="post"
                            role="form"
                            class="contactForm"
                        >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        id="name"
                                        placeholder="Your Name"
                                    />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="Your Email"
                                    />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    id="subject"
                                    placeholder="Subject"
                                />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea
                                    class="form-control"
                                    name="message"
                                    rows="5"
                                    placeholder="Message"
                                ></textarea>

                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>
            </section><!-- #contact -->

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
                                src="img/logo.png"
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
                                <strong>Phone:</strong>+91 79807-27708 / 91-79807-63840<br>
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
            id="register-volunteer"
            hide-footer
        >
            <template v-slot:modal-title>
                Volunteer Registration
            </template>
            <div class="d-block">
                <b-alert
                    variant="success"
                    show
                    v-if="isSuccess"
                >Hey {{ successData.name }}, thanks for applying! We will contact you soon! </b-alert>
                <div v-else>
                    <p>Fill in the fields below to complete your registration!</p>
                    <b-form @submit.prevent="volunteerSubmit">
                        <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                            description="We'll never share your email with anyone else."
                        >
                            <b-form-input
                                id="input-1"
                                v-model="volunteerForm.email"
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
                                v-model="volunteerForm.name"
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
                            id="input-group-8"
                            label="College ID:"
                            label-for="input-8"
                        >
                            <b-form-input
                                id="input-8"
                                v-model="volunteerForm.college_id"
                                :class="{'is-invalid': errors.college_id}"
                                required
                                placeholder="GNIT/YYYY/XXXX"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.college_id"
                            >{{ errors.college_id[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-3"
                            label="University Roll Number:"
                            label-for="input-3"
                        >
                            <b-form-input
                                id="input-3"
                                v-model="volunteerForm.college_roll"
                                :class="{'is-invalid': errors.college_roll}"
                                required
                                placeholder="Enter your college roll here"
                            ></b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.college_roll"
                            >{{ errors.college_roll[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-4"
                            label="Department:"
                            label-for="input-4"
                        >
                            <b-form-select
                                id="input-4"
                                v-model="volunteerForm.department_id"
                                :class="{'is-invalid': errors.department_id}"
                                :options="computedDepartments"
                                required
                            ></b-form-select>
                            <div
                                class="invalid-feedback"
                                v-if="errors.department"
                            >{{ errors.department_id[0] }}</div>
                        </b-form-group>

                        <b-form-group
                            id="input-group-5"
                            label="Year:"
                            label-for="input-5"
                        >
                            <b-form-select
                                id="input-5"
                                v-model="volunteerForm.year"
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
                                v-model="volunteerForm.phone"
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
                            id="input-group-7"
                            label="Field of Interest:"
                            label-for="input-7"
                        >
                            <b-form-input
                                id="input-7"
                                v-model="volunteerForm.field_of_interest"
                                :class="{'is-invalid': errors.field_of_interest}"
                                required
                                placeholder="Coding, Gaming, Robotics etc"
                            >
                            </b-form-input>
                            <div
                                class="invalid-feedback"
                                v-if="errors.field_of_interest"
                            >{{ errors.field_of_interest[0] }}</div>
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
            id="register-campus-ambassador"
            hide-footer
        >
            <template v-slot:modal-title>
                Campus Ambassador Registration
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

export default {
    methods: {
        countDown () {
            var now = new Date();
            var eventDate = new Date(2020, 2, 13);
            var currentTime = now.getTime();
            var eventTime = eventDate.getTime();
            var remTime = eventTime - currentTime;
            var s = Math.floor(remTime / 1000);
            var m = Math.floor(s / 60);
            var h = Math.floor(m / 60);
            var d = Math.floor(h / 24);
            h %= 24;
            m %= 60;
            s %= 60;
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            document.getElementById("days").innerText = d;
            document.getElementById("hours").innerText = h;
            document.getElementById("mins").innerText = m;
            document.getElementById("secs").innerText = s;
        },
        async volunteerSubmit () {
            this.isLoading = true
            await this.$axios
                .$post('/registration/volunteer', this.volunteerForm)
                .then((res) => {
                    this.isLoading = false
                    this.isSuccess = true
                    this.successData = res.volunteer
                })
                .catch((err) => {
                    this.isLoading = false
                    this.volunteerForm.name = ''
                    this.volunteerForm.email = ''
                    this.volunteerForm.college_roll = ''
                    this.volunteerForm.college_id = ''
                    this.volunteerForm.phone = ''
                    this.volunteerForm.department_id = null
                    this.volunteerForm.year = null
                })
        },
        async campusAmbassadorSubmit () {
            this.isLoading = true
            await this.$axios
                .$post('/registration/campuss-ambassador', this.campusAmbassadorForm)
                .then((res) => {
                    this.isLoading = false
                    this.isSuccess = true
                    this.successData = res.campuss_ambassador
                })
                .catch((err) => {
                    this.isLoading = false
                    this.campusAmbassadorForm.name = ''
                    this.campusAmbassadorForm.email = ''
                    this.campusAmbassadorForm.college_name = ''
                    this.campusAmbassadorForm.phone = ''
                    this.campusAmbassadorForm.department = ''
                    this.campusAmbassadorForm.year = null
                })
        }
    },
    mounted () {
        let deferredPrompt;
        const addBtn = document.querySelector('.add-button');
        addBtn.style.display = 'none';

        if (process.browser) {
            window.addEventListener('beforeinstallprompt', (e) => {
                // Prevent Chrome 67 and earlier from automatically showing the prompt
                e.preventDefault();
                // Stash the event so it can be triggered later.
                deferredPrompt = e;
                // Update UI to notify the user they can add to home screen
                addBtn.style.display = 'block';

                addBtn.addEventListener('click', (e) => {
                    // hide our user interface that shows our A2HS button
                    addBtn.style.display = 'none';
                    // Show the prompt
                    deferredPrompt.prompt();
                    // Wait for the user to respond to the prompt
                    deferredPrompt.userChoice.then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('User accepted the A2HS prompt');
                        } else {
                            console.log('User dismissed the A2HS prompt');
                        }
                        deferredPrompt = null;
                    });
                });
            });
        }

        setTimeout(function () {
            this.isPreLoading = false;
        }, 3000);

        this.$nextTick(function () {
            window.setInterval(() => {
                this.countDown();
            }, 1000);
        })

        this.$root.$on('bv::modal::hide', (bvEvent, modalId) => {
            if (this.isSuccess)
                this.isSuccess = false
        })
    },
    data () {
        return {
            isLoading: false,
            isPreLoading: true,
            isSuccess: false,
            successData: null,
            volunteerForm: {
                email: '',
                college_roll: '',
                college_id: '',
                name: '',
                phone: '',
                department_id: null,
                year: null,

            },
            campusAmbassadorForm: {
                email: '',
                college_name: '',
                name: '',
                phone: '',
                department: null,
                year: null,

            },
            departments: [],
            categories: [],
            years: [{ text: 'Select One', value: null }, { text: 'First year', value: '1st' }, { text: 'Second Year', value: '2nd' }, { text: 'Third Year', value: '3rd' }, { text: 'Fourth Year', value: '4th' }],
        }
    },
    computed: {
        computedDepartments () {
            const departments = [{ text: 'Select One', value: null }];
            this.departments.forEach((d) => {
                departments[d.id] = { text: d.name, value: d.id }
            })
            return departments
        },
        computedCategories () {
            const categories = [];
            this.categories.forEach((c) => {
                if (c.events.length > 0) categories.push(c)
            })
            return categories
        }
    },
    async asyncData ({ params, app }) {
        const response = await app.$axios.$get('/generic')
        return {
            departments: response.departments,
            categories: response.categories
        }
    }
}
</script>

<style>
#intro h2 {
  color: #fff;
  font-family: "Raleway", sans-serif;
  font-weight: 600;
  text-transform: uppercase;
}

#intro h2 span {
  color: #f82249;
}
</style>
