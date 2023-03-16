<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<style>
.sml {
  font-size: 14px;
}
</style>

<template>
    <Head title="Welcome" />

    <GuestLayout>
        <div class="col-12">
            <div class="row justify-content-center">
                
                <div class="col-md-8 col-sm-12 mb-3">
                    <div class="card text-white bg-primary py-5">
                        <div class="card-body text-base">
                            <div>
                                <h2>HRMS</h2>
                                <p class="mb-3">
                                “HRMS” stands for Human Resources Management System. It
                                refers to a suite of software that organizations use to
                                manage internal HR functions. From employee data
                                management to payroll, recruitment, benefits, training,
                                talent management, employee engagement, and employee
                                attendance, HRMS software helps HR professionals manage
                                the modern workforce. Also called a human resources
                                information system (HRIS), HRMS systems put information
                                about a company's most valuable assets in front of the
                                people who need them.
                                </p>
                                <small class="bg-info px-1 sml"
                                >https://www.oracle.com/in/human-capital-management/hrms</small
                                >
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </GuestLayout>
</template>
