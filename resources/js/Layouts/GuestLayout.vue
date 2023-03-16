<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <!-- CONTENT -->
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <!-- <header class="header header-sticky mb-3">
        <div class="container-fluid">
            <Link class="header-brand" :href="route('welcome')"> {{$page.props.appName}} </Link>
            <ul class="header-nav d-none d-md-flex ms-auto">
                <li class="nav-item"><Link class="nav-link" :href="route('login')">Login</Link></li>
                <li class="nav-item"><Link class="nav-link" href="#">Jobs</Link></li>
                <li class="nav-item"><Link class="nav-link" href="#">Help</Link></li>
            </ul>
        </div>
    </header> -->
    <div class="body flex-grow-1 px-0">
      <div class="container-fluid">
        <div class="row">
          <slot />
        </div>
      </div>
    </div>
    <!-- <footer class="footer text-muted">
        <div>
            Copyright &copy;2022 HRMS
        </div>
        <div class="ms-auto">
            Developed by <a href="https://juancoder.com" style="color: inherit;">Juancoder IT Solutions</a>
        </div>
    </footer> -->
  </div>
  <!-- /CONTENT -->
</template>
