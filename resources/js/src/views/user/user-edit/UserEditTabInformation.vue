<!-- =========================================================================================
  File Name: UserEditTabInformation.vue
  Description: User Edit Information Tab content
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="user-edit-tab-info">
    <div class="vx-row">
      <!-- Address Col -->
      <div class="vx-col w-full md:w-1/2" v-for="(city,index) in data_local.cities.slice(0,4)" :key="city.id">

          <!-- Col Header -->
          <div class="flex items-end md:mt-0 mt-base">
            <feather-icon icon="MapPinIcon" class="mr-2" svgClasses="w-5 h-5" />
            <span class="leading-none font-medium">Address {{index + 1}}</span>
          </div>

          <!-- Col Content -->
          <div v-if="city">
            <vs-input class="w-full mt-4" label="Address Line" v-model="city.pivot.address" v-validate="'required'" name="addd_line_1" />
            <span class="text-danger text-sm"  v-show="errors.has('addd_line_1')">{{ errors.first('addd_line_1') }}</span>

            <vs-input class="w-full mt-4" label="City" v-model="city.name" v-validate="'required|alpha'" name="city" />
            <span class="text-danger text-sm"  v-show="errors.has('city')">{{ errors.first('city') }}</span>

            <vs-input class="w-full mt-4" label="State" v-model="city.state.name" v-validate="'required|alpha'" name="state" />
            <span class="text-danger text-sm"  v-show="errors.has('state')">{{ errors.first('state') }}</span>

            <vs-input class="w-full mt-4" label="Country" v-model="city.state.country.name" v-validate="'required|alpha'" name="country" />
            <span class="text-danger text-sm"  v-show="errors.has('country')">{{ errors.first('country') }}</span>

          </div>
          <br v-if="city.id%2">
      </div>

    </div>

    <!-- Save & Reset Button -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="mt-8 flex flex-wrap items-center justify-end">
          <vs-button class="ml-auto mt-2" @click="save_changes" :disabled="!validateForm">Save Changes</vs-button>
          <vs-button class="ml-4 mt-2" type="border" color="warning" @click="reset_data">Reset</vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from 'vue-select'
export default {
  components: {
    vSelect
  },
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {

      data_local: JSON.parse(JSON.stringify(this.data)),

      langOptions: [
        { label: "English",  value: "english"  },
        { label: "Spanish",  value: "spanish"  },
        { label: "French",   value: "french"   },
        { label: "Russian",  value: "russian"  },
        { label: "German",   value: "german"   },
        { label: "Arabic",   value: "arabic"   },
        { label: "Sanskrit", value: "sanskrit" },
      ],
    }
  },
  computed: {
    validateForm() {
      return !this.errors.any()
    }
  },
  methods: {
    save_changes() {
      if(!this.validateForm) return

      // Here will go your API call for updating data
      // You can get data in "this.data_local"
    },
    reset_data() {
      this.data_local = Object.assign({}, this.data)
    }
  },
}
</script>
