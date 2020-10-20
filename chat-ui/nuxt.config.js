require("dotenv").config();

export default {
  mode: "spa",
  /*
   ** Headers of the page
   */
  env: {
    apiUrl: "http://127.0.0.1:9090/api",
    baseURL: "http://127.0.0.1:9090",
    appName: process.env.APP_NAME || "Laravel Nuxt",
    appLocale: process.env.APP_LOCALE || "en",
    githubAuth: !!process.env.GITHUB_CLIENT_ID,
    MIX_PUSHER_APP_KEY: "any.id"
  },
  head: {
    title: process.env.npm_package_name || "",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || ""
      }
    ],
    link: [
      { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
      {
        href:
          "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css",
        rel: "StyleSheet"
      }
    ],
    script: [
      {
        src: "https://code.jquery.com/jquery-3.5.1.slim.min.js",
        body: true
      },
      {
        src:
          "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js",
        body: true
      },
      {
        src:
          "https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js",
        body: true
      }
    ]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: "#fff" },
  /*
   ** Global CSS
   */
  css: [],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: ["~/plugins/axios.js", "~/plugins/echo.js"],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [],
  /*
   ** Nuxt.js modules
   */
  modules: [],
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  }
};
