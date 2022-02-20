<template>
  <div>
    <Head title="Training - BIO-RAD Digital Garden" />
    <div class="section-warp bg-color-dark">
      <div class="section-head top-section-head">
        <h1 class="section-title text-white text-uppercase">
          Sales &amp; Application Courses
        </h1>
        <h3 class="text-white section-subtitle">
          From Basic and Advanced sales training to Application training in
          format at convenience: presencial, online, on demand
        </h3>
        <div class="section-action">
          <div class="action-btn">
            <a
              target="_blank"
              href="https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html"
              class="btn bg-color-light text-uppercase"
            >
              Calendar Here
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="section-warp">
      <div class="section-head">
        <h1 class="section-title">
          Explore Topics and <span class="text-color-dark">Skills</span>
        </h1>
        <div class="filter-items mb-4">
          <div class="training-category">
            <a
              @click="changeCategory('self-learning-couses')"
              class="category-link"
              :class="{ active: selectedCategory === 'self-learning-couses' }"
              >Self Learning Couses</a
            >
            <a
              @click="changeCategory('sales-amp-applicatons-training-courses')"
              class="category-link"
              :class="{
                active:
                  selectedCategory === 'sales-amp-applicatons-training-courses',
              }"
              >Sales &amp; Applicatons Training Courses</a
            >
            <a
              @click="changeCategory('technical-courses')"
              class="category-link"
              :class="{
                active: selectedCategory === 'technical-courses',
              }"
              >Technical Courses</a
            >
          </div>
          <div class="training-mobile mt-2">
            <select
              @change="changeCategory($event.target.value)"
              id="countries"
              class="form-select"
            >
              <option value="self-learning-couses">Self Learning Couses</option>
              <option value="sales-amp-applicatons-training-courses">
                Sales &amp; Applicatons Training Courses
              </option>
              <option value="technical-courses">Technical Courses</option>
            </select>
          </div>
          <div class="d-flex">
            <div class="input-box">
              <input
                type="text"
                class="form-control"
                @input="searchItems($event.target.value)"
              />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="w-5 h-5 text-gray-500 dark:text-gray-400"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                ></path>
              </svg>
            </div>
          </div>
        </div>
        <div class="row align-items-center training-items">
          <div class="col-md-3 text-center">
            <select
              v-if="uniqueMonths.length > 0"
              @change="onMonthChange($event)"
              class="form-select"
            >
              <option v-for="d in uniqueMonths" :key="d" :value="d">
                {{ d }}
              </option>
            </select>
          </div>
          <div class="col-md-9 bg-white">
            <div v-if="selectedTrainings.length > 0" class="slider">
              <Carousel :breakpoints="breakpoints" :items-to-show="1">
                <Slide v-for="training in selectedTrainings" :key="training.id">
                  <div class="training-card carousel__item">
                    <div class="card-head">
                      <div class="card-date">
                        <span class="card-day">{{
                          training.training_date.split('-')[2]
                        }}</span>
                        <span class="card-month">{{
                          formatMonth(training.training_date)
                        }}</span>
                      </div>
                      <div class="card-time text-start">
                        <span class="fs-6 mb-2 pt-2 fw-bold">{{
                          training.training_time
                        }}</span>
                        <span class="fw-lighter">Submitted by</span>
                        <span class="fs-6 fw-bold">{{ training.by }}</span>
                      </div>
                    </div>
                    <a class="linear-background h-150" href="#">
                      <img
                        class="slide-image"
                        :src="training.photo"
                        :alt="training.name"
                      />
                    </a>
                    <div class="py-2">
                      <a href="#">
                        <h4 class="card-name">{{ training.name }}</h4>
                        <h4 class="card-area">{{ training.area }}</h4>
                      </a>
                      <a href="#">
                        <p class="card-desc">{{ training.short_desc }}</p>
                      </a>
                      <a href="#" class="card-btn"> Register Now </a>
                    </div>
                  </div>
                </Slide>

                <template #addons>
                  <Navigation />
                </template>
              </Carousel>
            </div>
            <div v-else class="w-100 text-center">
              There is no courses right now
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-warp">
      <div class="section-head">
        <p class="section-p">For beginer programs</p>
        <h1 class="section-title mt-0">
          For New <span class="text-color-dark">Comers</span>
        </h1>
        <Carousel :items-to-show="2" :breakpoints="breakpoints_beginer">
          <Slide v-for="slide in selfs" :key="slide.type_slug">
            <div class="me-2 carousel__item beginer">
              <Link :href="`/training/new-comers/${slide.type_slug}`">
                <img class="w-100" :src="`img/${slide.type_slug}.jpg`" alt="" />
              </Link>
              <div class="p-2 text-center">
                <Link
                  :href="`/training/new-comers/${slide.type_slug}`"
                  class=""
                >
                  <h4 class="name">{{ slide.type }}</h4>
                </Link>
                <Link
                  class="card-btn"
                  :href="`/training/new-comers/${slide.type_slug}`"
                >
                  Know more
                </Link>
              </div>
            </div>
          </Slide>

          <template #addons>
            <Pagination />
          </template>
        </Carousel>
      </div>
    </div>
    <div class="section-warp">
      <div class="section-head">
        <p class="section-p">Printy Lunched</p>
        <h1 class="section-title mt-0">
          Guilded <span class="text-color-dark">Training</span>
        </h1>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="me-2 carousel__item beginer">
              <a href="/training/self-learning-courses">
                <img class="w-100" src="img/a01.jpg" alt="" />
              </a>
              <div class="p-2 text-center">
                <a href="/training/self-learning-courses" class="">
                  <h4 class="name mb-0">Self Learning Courses</h4>
                </a>
                <a href="/training/self-learning-courses" class="card-btn">
                  Know More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="me-2 carousel__item beginer">
              <a href="/training/sales-training-courses">
                <img class="w-100" src="img/a02.jpg" alt="" />
              </a>
              <div class="p-2 text-center">
                <a href="/training/sales-training-courses" class="">
                  <h4 class="name mb-0">Sales Training Courses</h4>
                </a>
                <a href="/training/sales-training-courses" class="card-btn">
                  Know More
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="me-2 carousel__item beginer">
              <a href="/training/applicatons-training-courses">
                <img class="w-100" src="img/a03.jpg" alt="" />
              </a>
              <div class="p-2 text-center">
                <a href="/training/applicatons-training-courses" class="">
                  <h4 class="name mb-0">Applicatons Training Courses</h4>
                </a>
                <a
                  href="/training/applicatons-training-courses"
                  class="card-btn"
                >
                  Know More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import App from '@/Layouts/App'
import { Carousel, Navigation, Slide, Pagination } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default {
  components: {
    Head,
    Carousel,
    Slide,
    Navigation,
    Pagination,
    Link,
  },
  props: {
    trainings: Array,
    selfs: Array,
    filters: Object,
  },
  mounted() {
    this.filterTrainings()
  },
  methods: {
    onMonthChange(e) {
      this.selectedDate = new Date(e.target.value)
      this.filterTrainings()
    },
    changeCategory(s) {
      this.selectedCategory = s
      this.selectedDate = new Date()
      this.filterTrainings()
    },
    searchItems(str) {
      s = str.toLowerCase()
      this.selectedTrainings = this.trainings.filter(
        (i) =>
          i.name.toLowerCase().includes(s) ||
          i.area.toLowerCase().includes(s) ||
          i.by.toLowerCase().includes(s) ||
          i.type.toLowerCase().includes(s),
      )
    },
    filterTrainings() {
      this.selectedTrainings = this.trainings.filter(
        (item) => item.category_slug === this.selectedCategory,
      )
      if (!this.selectedDate) this.getLowestdate(this.selectedTrainings)

      let dts = this.getMonthDays(this.selectedDate)
      this.selectedTrainings = this.selectedTrainings.filter(
        (item) =>
          new Date(item.training_date) >= dts[0] &&
          new Date(item.training_date) <= dts[1],
      )
    },
    getLowestdate(a) {
      this.datesArray = [...new Set(a.map((e) => new Date(e.training_date)))]
      this.selectedDate = new Date(Math.min.apply(null, this.datesArray))
      let uniqueDates = []
      for (let i = 0; i < this.datesArray.length; i++) {
        const element = this.formatDates(this.datesArray[i])
        if (uniqueDates.indexOf(element) === -1) uniqueDates.push(element)
      }
      this.uniqueMonths = uniqueDates
    },
    getMonthDays(date) {
      let dt = new Date(date)
      let month = dt.getMonth(),
        year = dt.getFullYear()

      let fromDate = new Date(year, month, 1)
      let toDate = new Date(year, month + 1, 0)
      return [fromDate, toDate]
    },
    formatDates(d) {
      const event = new Date(d)
      const options = { year: 'numeric', month: 'long' }
      return event.toLocaleDateString(undefined, options)
    },
    formatMonth(d) {
      const event = new Date(d)
      const option = { month: 'long' }
      return event.toLocaleDateString(undefined, option)
    },
  },
  data() {
    return {
      selectedTrainings: [],
      selectedCategory: this.filters.category ?? 'self-learning-couses',
      selectedDate: null,
      datesArray: [],
      uniqueMonths: [],
      // any settings not specified will fallback to the carousel settings
      breakpoints: {
        // 700px and up
        700: {
          itemsToShow: 3,
          snapAlign: 'center',
        },
        // 1024 and up
        1024: {
          itemsToShow: 3,
          snapAlign: 'start',
        },
      },
      breakpoints_beginer: {
        // 700px and up
        700: {
          itemsToShow: 4,
          snapAlign: 'center',
        },
        // 1024 and up
        1024: {
          itemsToShow: 4,
          snapAlign: 'start',
        },
      },
      breakpoints_printy: {
        // 700px and up
        700: {
          itemsToShow: 3,
          snapAlign: 'center',
        },
        // 1024 and up
        1024: {
          itemsToShow: 3,
          snapAlign: 'start',
        },
      },
    }
  },
  layout: App,
}
</script>

<style>
.carousel__prev--in-active,
.carousel__next--in-active {
  display: none;
}
.carousel__pagination-button {
  background-color: #d8d9d7;
  border-radius: 100%;
  height: 12px;
  width: 12px;
}
.carousel__pagination-button--active {
  background-color: var(--light-color);
}
.carousel__prev,
.carousel__next {
  background-color: var(--dark-color);
}
</style>
