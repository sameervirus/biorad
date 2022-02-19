<template>
  <div class="page-head technical">
    <div class="section head">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6">
            <div class="text-box">
              <h1>Bio-Rad <span>Technical Support Site</span></h1>
              <div>
                Information of this website is for Bio-Rad Channel Partners
                personnel only, It is absolutely prohibited to provide documents
                on this website to the customers
              </div>
            </div>
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-warp">
    <div class="section-head">
      <h1 class="section-title mt-0">
        How Can we <span class="text-color-dark">Help?</span>
      </h1>
    </div>
    <div class="section-body">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-6 col-md-2">
            <Link href="#">
              <div class="icon-box">
                <Icon class="" name="training" />
                <p>Trainings</p>
              </div>
            </Link>
          </div>
          <div class="col-6 col-md-2">
            <Link href="#">
              <div class="icon-box">
                <Icon class="" name="elearn" />
                <p>E-Learning</p>
              </div>
            </Link>
          </div>
          <div class="col-6 col-md-2">
            <Link href="#">
              <div class="icon-box">
                <Icon class="" name="warranty" />
                <p>Warranty</p>
              </div>
            </Link>
          </div>
          <div class="col-6 col-md-2">
            <Link href="#">
              <div class="icon-box">
                <Icon class="" name="install" />
                <p>Install</p>
              </div>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-warp bg-secondary bg-opacity-10">
    <div class="section-head">
      <p class="section-p mb-0">Get Premier Tech Support</p>
      <h1 class="section-title mt-0 mb-0">
        Bio-Rad Technical <span class="text-color-dark">Support Site</span>
      </h1>
      <p class="section-p">A team of experts at your service</p>
    </div>
    <div class="section-body">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <img
              class="w-100"
              src="/img/tech01.jpg"
              alt="Clinical Diagnostics Division"
            />
          </div>
          <div class="col-md-5">
            <div class="side-div">
              <div class="gray-block">
                <div class="verticalLine">Clinical Diagnostics Division</div>
              </div>
              <p>
                Download service documents of Clinical Diagnostics instruments.
                service manual, user manuals, field bulletins, software,
                firmware etc..
              </p>
              <div class="section-action">
                <div class="action-btn">
                  <a href="#" class="btn btn-green"> Document Library </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center second-row">
          <div class="col-md-7">
            <img
              class="w-100"
              src="/img/tech02.jpg"
              alt="Life Science Division"
            />
          </div>
          <div class="col-md-5">
            <div class="side-div">
              <div class="gray-block">
                <div class="verticalLine">Life Science Division</div>
              </div>
              <p>
                Download service documents of Life Science instruments. service
                manual, user manuals, field bulletins, software, firmware etc..
              </p>
              <div class="section-action">
                <div class="action-btn">
                  <a href="#" class="btn btn-green"> Document Library </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-warp">
    <div class="section-head">
      <p class="section-p mb-0">Contact Us</p>
      <h1 class="section-title mt-0">
        Your Satisfaction is <span class="text-color-dark">Our Mission</span>
      </h1>
    </div>
    <div class="section-body">
      <div class="container">
        <div class="row justify-content-center contact-row">
          <div class="col-md-5">
            <div class="left-side">
              <div class="logo-svg">
                <Icon name="logo" class="w-100" />
              </div>
              <h3>We aim to reach you</h3>
              <h1>Anytime & Everywhere</h1>
              <p>
                Question or query, help is at hand. Contact Bio-Rad customer
                services or find the answer below.
              </p>
            </div>
          </div>
          <div class="col-md-5">
            <div class="ih-box bg-color-dark">
              <form class="tech-form">
                <div>
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" />
                </div>
                <div>
                  <label class="form-label">Email Address</label>
                  <input type="email" class="form-control" autocomplete="off" />
                </div>
                <div>
                  <label class="form-label">Company Name</label>
                  <input type="text" class="form-control" />
                </div>
                <div>
                  <label class="form-label">Subject Your Topic</label>
                  <input type="text" class="form-control" />
                </div>
                <div>
                  <label class="form-label">Message</label>
                  <textarea class="form-control" rows="4"></textarea>
                </div>
              </form>

              <div class="section-action justify-content-center">
                <div class="action-btn mb--3">
                  <a href="#" class="btn btn-green"> Submit </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import App from '@/Layouts/App'
import Icon from '@/Shared/Icon'
export default {
  components: {
    Icon,
    Link,
  },
  layout: App,

  setup() {},
}
</script>
