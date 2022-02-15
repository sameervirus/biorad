<template>
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container p-0">
      <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><logo class="logo-warp" /></a>
      <div class="collapse navbar-collapse justify-content-center menu" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <Link href="/" :class="{ active: $page.component === 'Home' }" class="menu-item"> Home </Link>
          <Link href="/solutions" :class="{ active: $page.component === 'Solutions/Index' }" class="menu-item"> Our Solutions </Link>
          <li class="menu-item" :class="{ active: $page.component === 'Trainings/Index' }" role="button" aria-expanded="false">
            <Link href="/training" class="">Training</Link>

            <ul class="dropdown-menu text-small user-dropdown" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <Link href="/events" :class="{ 'menu-item': $page.component === 'Events/Index' }" class="menu-item"> Events </Link>
          <Link href="/collateral-resources" :class="{ 'menu-item': $page.component === 'Collateral/Index' }" class="menu-item"> Collateral Resources </Link>
          <Link href="/technical-services" :class="{ 'menu-item': $page.component === 'Services/Index' }" class="menu-item"> Technical Services </Link>
        </ul>
      </div>
      <div class="right-warp">
        <!-- Profile dropdown -->
        <div class="right-container">
          <div v-if="$page.props.auth.user" class="d-flex justify-content-center">
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="user-name">{{ $page.props.auth.user.name }}</span>
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
              </a>
              <ul class="dropdown-menu text-small user-dropdown" aria-labelledby="dropdownUser1" style="">
                <li><Link class="dropdown-item" :href="`/admin/users/${$page.props.auth.user.id}/edit`">My Profile</Link></li>
                <li><Link class="dropdown-item" href="/logout" method="delete">Logout</Link></li>
              </ul>
            </div>
          </div>
          <div v-else class="flex">
            <Link href="/login">Login</Link>
          </div>
        </div>
      </div>
      <div class="search-icon" style="height: 65px">
        <a class="p-1 cursor-pointer">
          <!-- Heroicon name: outline/bell -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </a>
      </div>
    </div>
  </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Logo from '@/Shared/Logo'
export default {
  components: {
    Logo,
    Link,
  },
  setup() {
    // document.querySelectorAll('.dropdown-toggle').forEach((item) => {
    //   item.addEventListener('click', (event) => {
    //     if (event.target.classList.contains('dropdown-toggle')) {
    //       event.target.classList.toggle('toggle-change')
    //     } else if (event.target.parentElement.classList.contains('dropdown-toggle')) {
    //       event.target.parentElement.classList.toggle('toggle-change')
    //     }
    //   })
    // })
  },
}
</script>

<style scoped>
.profile-menu .dropdown-menu {
  right: 0;
  left: unset;
}
.profile-menu .fa-fw {
  margin-right: 10px;
}
.toggle-change::after {
  border-top: 0;
  border-bottom: 0.3em solid;
}
@media (min-width: 640px) {
  .navbar-brand {
    margin-left: 1rem;
  }
  .navbar {
    padding-top: 0;
    padding-bottom: 0;
  }
}

.menu {
  margin-top: 0.6rem;
}
</style>
