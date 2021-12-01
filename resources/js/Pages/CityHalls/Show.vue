<template>
<inertia-head :title="cityHall.name"/>

<BreezeAuthenticatedLayout>
    <template #header>
        {{ cityHall.name }}
    </template>

    <div class="section">
        <UpdateCityHallInformationForm :city-hall="cityHall" :cities="cities" />
    </div>

    <div class="section mt-12">
        <div class="text-right mb-6">
            <InertiaLink :href="route('contacts.create', { city_hall: cityHall.id })" class="btn-primary">
                Criar contato
            </InertiaLink>
        </div>

        <CityHallContactsTable :contacts="cityHall.contacts" />
    </div>
</BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import UpdateCityHallInformationForm from './Show/UpdateCityHallInformationForm.vue'
import CityHallContactsTable from './Show/CityHallContactsTable.vue'

defineProps({ cityHall: Object, cities: Array })
</script>
