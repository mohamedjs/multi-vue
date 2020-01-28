<template>
  <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">
    <span class="cursor-pointer flex items-center i18n-locale">
      <img class="h-4 w-5" :src="i18n_locale_img" :alt="$i18n.locale" />
      <span class="hidden sm:block ml-2">{{ getCurrentLocaleData.lang }}</span>
    </span>
    <vs-dropdown-menu class="w-48 i18n-dropdown vx-navbar-dropdown">
      <vs-dropdown-item @click="updateLocale('en')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/en.png" alt="en" /> &nbsp;English</vs-dropdown-item>
      <vs-dropdown-item @click="updateLocale('ar')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/ar.png" alt="fr" /> &nbsp;Arabic</vs-dropdown-item>
    </vs-dropdown-menu>
  </vs-dropdown>
</template>

<script>
export default {
  computed: {
    i18n_locale_img() {
        const locale = this.$i18n.locale;
        if (locale == "en")      return require(`@assets/images/flags/en.png`)
        else if (locale == "ar") return require(`@assets/images/flags/ar.png`)
    },
    getCurrentLocaleData() {
        const locale = this.$i18n.locale;
        if (locale == "en")      return { flag: "us", lang: 'English'    }
        else if (locale == "ar") return { flag: "ar", lang: 'Arabic' }
    },
  },
  methods: {
    updateLocale(locale) {
              this.$i18n.locale = locale
              localStorage.setItem("lang",locale)
              this.$http.defaults.headers.common['X-localization'] =  locale
              this.$vs.rtl = locale == 'ar' ? true:false;
              document.documentElement.setAttribute("dir", locale == 'ar' ? "rtl" : "ltr")
              var location = this.$route.fullPath
              this.$router.replace('/')
              this.$nextTick(() => this.$router.replace(location))
              this.$validator.localize(locale);
    },
  }
}
</script>
