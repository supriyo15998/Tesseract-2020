
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'css/style.css'},
      { rel: 'stylesheet', href: 'lib/owlcarousel/assets/owl.carousel.min.css'},
      { rel: 'stylesheet', href: 'lib/venobox/venobox.css'},
      { rel: 'stylesheet', href: 'lib/animate/animate.min.css'},
      { rel: 'stylesheet', href: 'lib/font-awesome/css/font-awesome.min.css'},
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800'}
    ],
    script: [
      {
        src: "lib/jquery/jquery.min.js"
      },
      {
        src: "lib/jquery/jquery-migrate.min.js"
      },
      {
        src: "lib/bootstrap/js/bootstrap.bundle.min.js"
      },
      {
        src: "lib/easing/easing.min.js"
      },
      {
        src: "lib/superfish/hoverIntent.js"
      },
      {
        src: "lib/superfish/superfish.min.js"
      },
      {
        src: "lib/wow/wow.min.js"
      },
      {
        src: "lib/venobox/venobox.min.js"
      },
      {
        src: "lib/owlcarousel/owl.carousel.min.js"
      },
      {
        src: "js/main.js"
      },
      {
        src: "js/countdown.js"
      }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org
    'bootstrap-vue/nuxt',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/pwa',
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },
  server: {
    //host: '172.19.101.130'
  }
}
