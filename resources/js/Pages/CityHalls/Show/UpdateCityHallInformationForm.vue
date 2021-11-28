<template>
<div v-show="!!$page.props.flash.success" class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-center w-12 bg-green-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
        </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-green-500">Sucesso</span>
            <p class="text-sm text-gray-600">{{ $page.props.flash.success }}</p>
        </div>
    </div>
</div>

<form @submit.prevent="updateCityHall">
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6">
            <BreezeLabel for="name" value="Nome" />
            <BreezeInput id="name" type="text" v-model="updateForm.name" class="block mt-1 w-full" />
            <BreezeInputError :message="updateForm.errors.name" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <BreezeLabel for="phone_number" value="Telefone" />
            <BreezeInput id="phone_number" type="text" v-model="updateForm.phone_number" class="block mt-1 w-full" />
            <BreezeInputError :message="updateForm.errors.phone_number" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <BreezeLabel for="population" value="Habitantes" />
            <BreezeInput id="population" type="number" v-model="updateForm.population" class="block mt-1 w-full" />
            <BreezeInputError :message="updateForm.errors.population" />
        </div>

        <div class="col-span-6">
            <BreezeLabel for="city_id" value="Cidade" />
            <select id="city_id" v-model="updateForm.city_id" class="input block mt-1 w-full">
                <option></option>
                <option v-for="city in cities" :key="city.id" :value="city.id">
                    {{ city.name }}
                </option>
            </select>
            <BreezeInputError :message="updateForm.errors.city_id" />
        </div>
    </div>

    <div class="flex items-center gap-6 mt-6">
        <BreezeButton :disabled="updateForm.processing">
            Atualizar
        </BreezeButton>

        <BreezeButton type="button" @click="removeCityHall" :disabled="updateForm.processing" class="!bg-red-500 active:!bg-red-600 hover:!bg-red-600">
            Remover
        </BreezeButton>
    </div>
</form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';

const props = defineProps({ cityHall: Object, cities: Array })

const updateForm = useForm({
    name: props.cityHall.name,
    phone_number: props.cityHall.phone_number,
    population: props.cityHall.population,
    city_id: props.cityHall.city_id,
})

function updateCityHall() {
    updateForm.put(route('city-halls.update', props.cityHall))
}

function removeCityHall() {
    updateForm.delete(route('city-halls.destroy', props.cityHall))
}
</script>
