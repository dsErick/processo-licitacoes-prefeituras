<template>
<div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
    <div class="overflow-x-auto w-full">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                    <th class="w-px"></th>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Término do mandato</th>
                    <th class="px-4 py-3">Atividades</th>
                    <th class="px-4 py-3">Tipo de contato</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                <tr v-for="contact in contacts.data" :key="contact.id" class="text-gray-700">
                    <td class="px-4 py-3 text-sm">
                        <!-- <InertiaLink :href="route('contacts.show', contact)" class="text-blue-500 underline"> -->
                        <InertiaLink href="#" class="text-blue-500 underline">
                            Ver
                        </InertiaLink>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ contact.name }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ new Date(contact.mandate_ends_at).toLocaleDateString() }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ contact.activities_count }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ contact.contact_type?.name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
        <VPagination :links="contacts.links" preserve-scroll />
    </div>
 </div>
</template>

<script setup>
import VPagination from '@/Components/Pagination.vue';

defineProps({ contacts: Object  })
</script>
