<template>
  <div>
    <div class="section-warp bg-color-dark">
      <div class="section-head top-section-head">
        <h1 class="section-title text-white text-uppercase">Sales &amp; Application Courses</h1>
        <h3 class="text-white section-subtitle">From Basic and Advanced sales training to Application training in format at convenience: presencial, online, on demand</h3>
        <div class="section-action">
          <div class="action-btn">
            <a href="#" class="btn bg-color-light text-uppercase"> Calendar Here </a>
          </div>
        </div>
      </div>
    </div>
    <div class="section-warp">
      <div class="section-head">
        <h1 class="section-title">Explore Topics and <span class="text-color-dark">Skills</span></h1>
        <div class="d-flex mb-4">
          <div class="training-category">
            <a href="#" class="category-link active">Self Learning Couses</a>
            <a href="#" class="category-link">Sales &amp; Applicatons Training Courses</a>
            <a href="#" class="category-link">Technical Courses</a>
          </div>
          <div class="training-mobile">
            <select id="countries" class="form-select">
              <option value="1">Self Learning Couses</option>
              <option value="2">Sales &amp; Applicatons Training Courses</option>
              <option value="3">Technical Courses</option>
            </select>
          </div>
          <div class="d-flex">
            <div class="input-box">
              <input type="text" class="form-control" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <div class="d-none position-relative mt-1">
              <input type="text" id="email-adress-icon" class="search-input" placeholder="Search ..." />
              <div class="search-input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </div>
              <input type="search" class="form-control ds-input" id="search-input" placeholder="Search docs..." aria-label="Search docs for..." autocomplete="off" data-bd-docs-version="5.1" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top" />
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-3 text-center">
            <select id="countries" class="form-select">
              <option value="1">March 2022</option>
              <option value="2">April 2022</option>
              <option value="3">May 2022</option>
            </select>
          </div>
          <div class="col-md-9">
            <div class="slider">
              <Carousel :settings="settings" :breakpoints="breakpoints">
                <Slide v-for="slide in 10" :key="slide">
                  <div class="training-card carousel__item">
                    <div class="card-head">
                      <div class="card-date">
                        <span class="card-day">02</span>
                        <span class="card-month">March</span>
                      </div>
                      <div class="card-time text-start">
                        <span class="fs-6 mb-2 pt-2 fw-bold">9:00 - 12:00 PM</span>
                        <span class="fw-lighter">Submitted by</span>
                        <span class="fs-6 fw-bold">CID</span>
                      </div>
                    </div>
                    <a href="#">
                      <img class="slide-image" src="img/BioPlex-2200.jpg" alt="" />
                    </a>
                    <div class="py-2">
                      <a href="#">
                        <h4 class="card-name">Bioplex 2200</h4>
                        <h4 class="card-area">Application</h4>
                      </a>
                      <a href="#">
                        <p class="card-desc">Course Short Description</p>
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
          </div>
        </div>
      </div>
    </div>
    <div class="section-warp">
      <div class="section-head">
        <p class="section-p">For beginer programs</p>
        <h1 class="section-title mt-0">For New <span class="text-color-dark">Comers</span></h1>
        <Carousel :settings="settings_beginer" :breakpoints="breakpoints_beginer">
          <Slide v-for="slide in 10" :key="slide">
            <div class="me-2 carousel__item beginer">
              <a href="#">
                <img class="w-100" src="img/img4.png" alt="" />
              </a>
              <div class="p-2 text-center">
                <a href="#" class="">
                  <h4 class="name">Course Name</h4>
                </a>
                <a href="#" class="card-btn"> Register Now </a>
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
        <h1 class="section-title mt-0">Guilded <span class="text-color-dark">Training</span></h1>
        <Carousel :settings="settings_printy" :breakpoints="breakpoints_printy">
          <Slide v-for="slide in 10" :key="slide">
            <div class="me-2 carousel__item beginer">
              <a href="#">
                <img class="w-100" src="img/img4.png" alt="" />
              </a>
              <div class="p-2 text-center">
                <a href="#" class="">
                  <h4 class="name mb-0">Course Name</h4>
                  <p class="mb-3">second title</p>
                </a>
                <a href="#" class="card-btn"> Register Now </a>
              </div>
            </div>
          </Slide>

          <template #addons>
            <Pagination />
          </template>
        </Carousel>
      </div>
    </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
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
  },
  data() {
    return {
      // carousel settings
      settings: {
        itemsToShow: 1,
        snapAlign: 'center',
      },
      settings_beginer: {
        itemsToShow: 2,
        snapAlign: 'center',
      },
      settings_printy: {
        itemsToShow: 2,
        snapAlign: 'center',
      },

      // breakpoints are mobile first
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
