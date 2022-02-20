<template>
  <div class="section-warp bg-secondary bg-opacity-10">
    <div class="section-head">
      <h1 class="section-subtitle mb-0">{{ t.category }}</h1>
      <p class="section-p" v-if="text">
        {{ text }}
      </p>
      <p class="section-p">{{ counts }} Training Courses</p>
    </div>
    <div class="section-body">
      <div class="container">
        <div class="row justify-content-center">
          <div
            v-for="t in getCategory(selfs, 'serology')"
            :key="t.id"
            class="col-md-12"
          >
            <div class="video-warp">
              <div class="position-relative linear-background h-200">
                <img :src="t.photo" :alt="t.title" class="w-100" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    t: Object,
    counts: Number,
    text: String,
  },
}
</script>
