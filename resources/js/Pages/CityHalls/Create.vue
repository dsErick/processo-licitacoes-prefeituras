<template>
<inertia-head title="Cadastrar prefeitura"/>

<BreezeAuthenticatedLayout>
    <template #header>
        Cadastrar prefeitura
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <BreezeLabel for="name" value="Nome" />
                    <BreezeInput id="name" type="text" v-model="form.name" class="block mt-1 w-full" />
                    <BreezeInputError :message="form.errors.name" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <BreezeLabel for="phone_number" value="Telefone" />
                    <BreezeInput id="phone_number" type="text" v-model="form.phone_number" class="block mt-1 w-full" />
                    <BreezeInputError :message="form.errors.phone_number" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <BreezeLabel for="population" value="Habitantes" />
                    <BreezeInput id="population" type="number" v-model="form.population" class="block mt-1 w-full" />
                    <BreezeInputError :message="form.errors.population" />
                </div>

                <div class="col-span-6">
                    <BreezeLabel for="city_id" value="Cidade" />
                    <select id="city_id" v-model="form.city_id" class="input block mt-1 w-full">
                        <option></option>
                        <option v-for="city in cities" :key="city.id" :value="city.id">
                            {{ city.name }}
                        </option>
                    </select>
                    <BreezeInputError :message="form.errors.city_id" />
                </div>
            </div>

            <div class="text-right mt-6">
                <BreezeButton :disabled="form.processing">
                    Cadastrar
                </BreezeButton>
            </div>
        </form>
    </div>
</BreezeAuthenticatedLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeInputError from '@/Components/InputError.vue';

defineProps({ cities: Array })

const form = useForm({
    name: '',
    phone_number: '',
    population: '',
    city_id: '',
})

function submit() {
    form.post(route('city-halls.store'))
}
</script>
