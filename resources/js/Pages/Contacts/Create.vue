<template>
<inertia-head title="Cadastrar contato"/>

<BreezeAuthenticatedLayout>
    <template #header>
        Cadastrar contato
    </template>

    <div class="section">
        <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <BreezeLabel for="name" value="Nome" />
                    <BreezeInput id="name" type="text" v-model="form.name" class="block mt-1 w-full" />
                    <BreezeInputError :message="form.errors.name" />
                </div>

                <div class="col-span-6">
                    <BreezeLabel for="mandate_ends_at" value="Término do mandato" />
                    <BreezeInput id="mandate_ends_at" type="date" v-model="form.mandate_ends_at" class="block mt-1 w-full" />
                    <BreezeInputError :message="form.errors.mandate_ends_at" />
                </div>

                <div class="col-span-6">
                    <BreezeLabel for="city_hall_id" value="Prefeitura" />
                    <select id="city_hall_id" v-model="form.city_hall_id" class="input block mt-1 w-full">
                        <option></option>
                        <option v-for="cityHall in cityHalls" :key="cityHall.id" :value="cityHall.id">
                            {{ cityHall.name }}
                        </option>
                    </select>
                    <BreezeInputError :message="form.errors.city_hall_id" />
                </div>

                <div class="col-span-6">
                    <BreezeLabel for="contact_type_id" value="Tipo de contato" />
                    <select id="contact_type_id" v-model="form.contact_type_id" class="input block mt-1 w-full">
                        <option></option>
                        <option v-for="contactType in contactTypes" :key="contactType.id" :value="contactType.id">
                            {{ contactType.name }}
                        </option>
                    </select>
                    <BreezeInputError :message="form.errors.contact_type_id" />
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

defineProps({ contactTypes: Array, cityHalls: Array })

const form = useForm({
    name: '',
    mandate_ends_at: '',
    contact_type_id: '',
    city_hall_id: (new URLSearchParams(window.location.search)).get('city_hall') ?? '',
})

function submit() {
    form.post(route('contacts.store'))
}
</script>
