<template>
  <div>
    <Head title="Application courses - BIO-RAD Digital Garden" />
    <div class="section-warp bg-color-dark">
      <div class="section-head top-section-head">
        <h1 class="section-title text-white text-uppercase">
          Application courses
        </h1>
        <h3 class="text-white section-subtitle">
          “Better support our customers”. Courses for the Bio-Rad segments of
          clinical diagnostics: Blood typing, Infectious disease, Quality
          Control, Hemoglobin testing, Microbiology, Autoimmune
        </h3>
      </div>
    </div>

    <div id="infectious-disease-microbiology" class="section-warp pb-3">
      <div class="section-head">
        <h1 class="section-title mb-0">
          <h1 class="section-title mb-0">
            4- Application <span class="text-color-dark">Training</span>
          </h1>
        </h1>
      </div>
    </div>

    <div
      v-for="t in getCategory(selfs, '4-application-training')"
      :key="t.id"
      class="section-warp"
    >
      <div class="section-head">
        <h1 class="section-subtitle mb-0">{{ t.category }}</h1>
        <p class="section-p">{{ t.sub_title }}</p>
      </div>
      <div class="section-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="video-warp">
                <div class="position-relative h-200">
                  <img :src="t.photo" :alt="t.title" class="w-100" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-warp">
      <div class="section-body">
        <div class="container">
          <div class="row align-items-center banner-sales">
            <div class="col-10">
              <h1>Register to Application training</h1>
              <h3>2022 Training plan coming soon with registration form</h3>
            </div>
            <did class="col-2">
              <button class="btn btn-lights">Register</button>
            </did>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import App from '@/Layouts/App'

export default {
  components: {
    Head,
  },
  props: {
    selfs: Array,
  },
  mounted() {},
  methods: {
    getCategory(array, str) {
      return array.filter((i) => i.category_slug === str)
    },
  },

  layout: App,
}
</script>
