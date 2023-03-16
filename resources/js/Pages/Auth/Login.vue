<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components_lara/InputError.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref, onMounted, onErrorCaptured } from "vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  username: "",
  password: "",
});

const submit = () => {
  form.post(route("login"), {
    onSuccess: () => {
      form.reset("password");
      
      const msg = usePage().props.value.flash.message;
      if(msg == null){
        location.reload();
      }
    },
  });
};

</script>
<template>
  <GuestLayout>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" @submit.prevent="submit">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username"
                                                v-model="form.username"
                                                required
                                                autofocus
                                                autocomplete="off"
                                                placeholder="Username">
                                        </div>
                                        <InputError
                                          class="mt-1"
                                          :message="form.errors.username"
                                        />

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password"
                                                id="password"
                                                v-model="form.password"
                                                required
                                                autocomplete="off">
                                        </div>
                                        <InputError
                                          class="mt-1"
                                          :message="form.errors.password"
                                        />
                                        
                                        <div class="alert alert-danger" role="alert" v-if="$page.props.flash.message != null">
                                          {{ $page.props.flash.message }}
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block"
                                          type="submit"
                                          :class="{ 'opacity-25': form.processing }"
                                          :disabled="form.processing"
                                        >
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
  </GuestLayout>
</template>