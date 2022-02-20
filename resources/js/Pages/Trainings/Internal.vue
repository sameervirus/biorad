<template>
  <div>
    <Head :title="`${getTitle().name} - BIO-RAD Digital Garden`" />
    <div class="section-warp bg-color-dark">
      <div class="section-head top-section-head">
        <h1 class="section-title text-white text-uppercase">
          {{ getTitle().name }}
        </h1>
        <h3 class="text-white section-subtitle">
          {{ getTitle().text }}
        </h3>
        <div class="section-action">
          <div class="action-btn">
            <a
              :href="getTitle().calendar_here"
              target="_blank"
              class="btn bg-color-light text-uppercase"
            >
              Calendar Here
            </a>
          </div>
        </div>
      </div>
    </div>
    <div v-if="segment == 'infectious-disease-microbiology'">
      <div
        v-for="t in getType(selfs, segment)"
        :key="t.id"
        class="section-warp"
      >
        <div v-if="!t.category.match(/^\d/)" class="section-head">
          <h1 class="section-subtitle mb-0">{{ t.category }}</h1>
        </div>
        <div v-if="!t.category.match(/^\d/)" class="section-body">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="image-warp">
                  <div class="position-relative linear-background h-200">
                    <img :src="t.photo" :alt="t.title" class="w-100" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else id="quality-control" class="section-warp">
      <div class="section-body">
        <div class="container">
          <div class="row justify-content-center">
            <div
              v-for="t in getType(selfs, segment)"
              :key="t.id"
              class="col-md-4"
            >
              <div class="video-warp">
                <div class="position-relative linear-background h-200">
                  <img :src="t.photo" :alt="t.title" class="w-100" />
                </div>
              </div>
              <div class="video-warp">
                <div
                  @click="setVideo(t.properties.link)"
                  class="position-relative linear-background h-200"
                >
                  <img :src="t.photo" :alt="t.title" class="w-100" />
                  <span class="over-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="40"
                      height="39.995"
                      viewBox="0 0 40 39.995"
                    >
                      <g
                        id="svgexport-6_1_"
                        data-name="svgexport-6 (1)"
                        transform="translate(0 -0.002)"
                      >
                        <g
                          id="Group_12522"
                          data-name="Group 12522"
                          transform="translate(0 0.002)"
                        >
                          <path
                            id="Path_9074"
                            data-name="Path 9074"
                            d="M22.444,15.987,14.138,9.95a1,1,0,0,0-1.591.808V22.829a1,1,0,0,0,.547.893,1.009,1.009,0,0,0,.455.108,1,1,0,0,0,.588-.194L22.444,17.6a.994.994,0,0,0,0-1.616Z"
                            transform="translate(4.154 3.228)"
                            fill="#fff"
                          />
                          <path
                            id="Path_9075"
                            data-name="Path 9075"
                            d="M20,0A20,20,0,1,0,40,20,20,20,0,0,0,20,0ZM20,36.66A16.66,16.66,0,1,1,36.658,20,16.657,16.657,0,0,1,20,36.66Z"
                            transform="translate(0 -0.002)"
                            fill="#fff"
                          />
                        </g>
                      </g>
                    </svg>
                  </span>
                </div>
                <div class="details">
                  <span>{{ t.properties.sub_title }}</span>
                  <h5 class="fw-bold">
                    {{ t.properties.title }}
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      v-if="Number.isInteger(new Date().getTime() / 2)"
      class="section-warp banner"
    >
      <div class="section-body">
        <div class="container">
          <div class="row g-0 justify-content-center banner-liner">
            <div class="col-md-6">
              <img class="w-100" src="/img/banner-liner.jpg" alt="" />
            </div>
            <div class="col-md-6 banner-text">
              <h4>To access IHD academy platform</h4>
              <p>
                you need to request a login creation to your Bio-Rad Field
                Application Specialist.
              </p>

              <div class="section-action">
                <div class="action-btn">
                  <a href="#" class="btn btn-white"> Register Now </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="section-warp banner">
      <div class="section-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="ih-box">
                <div class="mb-3">
                  <img class="w-100" src="/img/ih500.jpg" alt="" />
                </div>
                <h4 class="fw-bold text-uppercase">IH-500 System Overview</h4>
                <p>
                  On completing this training, you will be able to identify and
                  understand the mechanical features/benefits of the different
                  modules of the IH-500
                </p>
                <div class="section-action justify-content-center">
                  <div class="action-btn mb--3">
                    <a href="#" class="btn btn-green"> See All </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="ih-box">
                <div class="mb-3">
                  <img class="w-100" src="/img/ih1000.jpg" alt="" />
                </div>
                <h4 class="fw-bold text-uppercase">IH-1000 System Overview</h4>
                <p>
                  On completing this training, you will be able to identify and
                  understand the mechanical features/benefits of the different
                  modules of the IH-1000
                </p>
                <div class="section-action justify-content-center">
                  <div class="action-btn mb--3">
                    <a href="#" class="btn btn-green"> See All </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

    <vue-final-modal :click-to-close="true" v-model="showModal">
      <div class="d-flex vh-100">
        <div class="youtube-warp">
          <iframe
            width="560"
            height="315"
            :src="seletedVideo"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
        <span @click="showModal = false" class="video-close"
          ><svg
            xmlns:svg="http://www.w3.org/2000/svg"
            version="1.1"
            x="0px"
            y="0px"
            width="24px"
            height="24px"
            viewBox="0 0 24 24"
            style="enable-background: new 0 0 24 24"
            xml:space="preserve"
            id="svg2"
            inkscape:version="0.48.4 r9939"
          >
            <g id="Icons" style="opacity: 1; fill: #ffffff">
              <g id="close" style="fill: #ffffff">
                <polygon
                  id="x"
                  style="fill-rule: evenodd; clip-rule: evenodd; fill: #ffffff"
                  points="18.717,6.697 17.303,5.283 12,10.586 6.697,5.283    5.283,6.697 10.586,12 5.283,17.303 6.697,18.717 12,13.414 17.303,18.717 18.717,17.303 13.414,12   "
                />
              </g>
            </g></svg
        ></span>
      </div>
    </vue-final-modal>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import App from '@/Layouts/App'
import CategoryCourses from '@/Components/CategoryCourses'
import { $vfm, VueFinalModal, ModalsContainer } from 'vue-final-modal'

export default {
  components: {
    Head,
    VueFinalModal,
    ModalsContainer,
    CategoryCourses,
  },
  props: {
    selfs: Array,
    segment: String,
  },
  methods: {
    getType(array, str) {
      return array.filter((i) => i.type_slug === str)
    },
    getCategory(array, str) {
      return array.filter((i) => i.category_slug === str)
    },
    setVideo(video) {
      this.seletedVideo = video
      this.showModal = true
    },
    getTitle() {
      return this.jsonData[this.segment]
    },
  },
  data() {
    return {
      seletedVideo: '',
      showModal: false,

      jsonData: {
        'quality-control': {
          name: 'Training Quality Control',
          text: 'QC products, data management tools and service covering 100 of analytes and 1000 of methods',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
          Molecular_QC_Testing:
            'https://biorad.sharepoint.com/:f:/s/EMEADigitalGarden/Eu5e_MzJYitNhw6xbLHaVUcBdjinXuPhfAeRA9DlL6M9Uw?e=83u3bd',
        },
        'blood-typing': {
          name: 'Training Blood Typing',
          text: 'Blood group serology testing from traditional methods to flexible automation',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
        },
        'hemoglobin-testing': {
          name: 'Training Hemoglobin Testing',
          text: 'Reagents and Instruments for testing of Diabetes HbA1c or screening of Hemoglobinopathies',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
        },
        'infectious-disease-microbiology': {
          name: 'Infectious disease',
          text: 'Comprehensive range of microplate immunoassay reagents including instruments, software',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
        },
        microbiology: {
          name: 'Microbiology',
          text: 'Culture media, rapid assays and other tools for the diagnosis of microbial infections',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
        },
        Autoimmune: {
          name: 'Autoimmune',
          text: 'High throughput systems for IFA, EIA and Multiplex technologies',
          calendar_here:
            'https://outlook.office365.com/owa/calendar/491a5f2433f84c5ea25850e3d23f3d46@Bio-Rad.com/13b2203dea23403c94c65ac80e63694e18201989733276816969/calendar.html',
        },
      },
    }
  },
  layout: App,
}
</script>
