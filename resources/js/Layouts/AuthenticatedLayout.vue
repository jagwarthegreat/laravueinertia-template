<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>

  <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <slot name="breadcrumbs" />
        </div>

        <slot />
    </div>
    <!-- /.container-fluid -->
</template>
