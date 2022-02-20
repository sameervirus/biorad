<template>
  <div>
    <Head title="Sales courses - BIO-RAD Digital Garden" />
    <div class="section-warp bg-color-dark">
      <div class="section-head top-section-head">
        <h1 class="section-title text-white text-uppercase">Sales courses</h1>
        <h3 class="text-white section-subtitle">
          Basic Sales Training (Module 2): “Position our solution” by product
          and customer segment Advanced Sales Training (Module 3): Sales
          argument “Sell deeper”.
        </h3>
      </div>
    </div>

    <div id="infectious-disease-microbiology" class="section-warp pb-3">
      <div class="section-head">
        <h1 class="section-title mb-0">
          <h1 class="section-title mb-0">
            2 & 3- Sales <span class="text-color-dark">Training</span>
          </h1>
        </h1>
      </div>
    </div>

    <div
      v-for="t in getCategory(selfs, '2-sales-training')"
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
    <div
      v-for="t in getCategory(selfs, '3-sales-training')"
      :key="t.id"
      class="section-warp bg-secondary bg-opacity-10"
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
              <h1>Register to the next Sales training….</h1>
              <h3>Will Start Soon</h3>
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
