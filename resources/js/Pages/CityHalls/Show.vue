<template>
<inertia-head :title="cityHall.name"/>

<BreezeAuthenticatedLayout>
    <template #header>
        {{ cityHall.name }}
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <UpdateCityHallInformationForm :city-hall="cityHall" :cities="cities" />
    </div>
</BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import UpdateCityHallInformationForm from './Show/UpdateCityHallInformationForm.vue'

defineProps({ cityHall: Object, cities: Array })
</script>
