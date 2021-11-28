<template>
<inertia-head title="Prefeituras"/>

<BreezeAuthenticatedLayout>
    <template #header>
        Prefeituras
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <!-- <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Info</span>
                    <p class="text-sm text-gray-600">Sample table page</p>
                </div>
            </div>
        </div> -->

        <div class="text-right mb-6">
            <inertia-link :href="route('city-halls.create')" class="btn-primary">
                Criar prefeitura
            </inertia-link>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="w-px"></th>
                            <th class="px-4 py-3">Nome</th>
                            <th class="px-4 py-3">Cidade</th>
                            <th class="px-4 py-3">Telefone</th>
                            <th class="px-4 py-3">Habitantes</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        <tr v-for="cityHall in cityHalls.data" :key="cityHall.id" class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                <inertia-link :href="route('city-halls.show', cityHall)" class="text-blue-500 underline">
                                    Ver
                                </inertia-link>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ cityHall.name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ cityHall.city?.name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ cityHall.phone_number }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ cityHall.population }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                <v-pagination :links="cityHalls.links" />
            </div>
        </div>
    </div>
</BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import VPagination from '@/Components/Pagination.vue'
import BreezeButton from '@/Components/Button.vue'

defineProps({ cityHalls: Object })
</script>
