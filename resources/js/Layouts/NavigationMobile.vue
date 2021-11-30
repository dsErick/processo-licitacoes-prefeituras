<template>
  <transition
      enter-active-class="transition ease-in-out duration-150"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="transition ease-in-out duration-150"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0">
    <div v-show="$page.props.showingMobileMenu" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
  </transition>

  <transition
      enter-active-class="transition ease-in-out duration-150"
      enter-from-class="opacity-0 transform -translate-x-20"
      enter-to-class="opacity-100"
      leave-active-class="transition ease-in-out duration-150"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0 transform -translate-x-20">
    <aside v-show="$page.props.showingMobileMenu" class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800" href="{{ route('dashboard') }}">
          Windmill
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            <BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
              <template #icon>
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
              </template>
              Dashboard
            </BreezeNavLink>
          </li>

          <li class="relative px-6 py-3">
            <BreezeNavLink :href="route('city-halls.index')" :active="route().current('city-halls.*')">
              <template #icon>
                <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                    <path d="M486.403,459.509v-8.533c-0.071-10.785-6.897-20.368-17.067-23.959v-10.174c-0.033-10.813-6.868-20.435-17.067-24.028    V261.67c10.199-3.592,17.033-13.214,17.067-24.028v-15.05l15.55-31.1l24.616-24.617c3.332-3.327,3.337-8.725,0.01-12.057    c-0.482-0.482-1.019-0.905-1.601-1.259L260.445,2.546c-2.727-1.667-6.157-1.667-8.883,0L4.095,153.559    c-4.022,2.448-5.299,7.693-2.851,11.715c0.354,0.582,0.777,1.12,1.259,1.601l24.616,24.617l15.55,31.1v15.05    c0.033,10.813,6.868,20.435,17.067,24.027v131.145c-10.199,3.592-17.033,13.214-17.067,24.028v10.174    c-10.17,3.591-16.996,13.174-17.067,23.959v8.533c-14.132,0.015-25.585,11.468-25.6,25.6v17.067    c-0.001,4.712,3.817,8.532,8.529,8.533c0.002,0,0.003,0,0.004,0H503.47c4.712,0.001,8.532-3.817,8.533-8.529    c0-0.001,0-0.003,0-0.004v-17.067C511.988,470.977,500.535,459.524,486.403,459.509z M452.27,237.642    c-0.005,4.711-3.822,8.529-8.533,8.533h-51.2c-4.711-0.005-8.529-3.822-8.533-8.533v-8.533h68.267V237.642z M213.337,392.815    V261.67c10.199-3.592,17.033-13.214,17.067-24.028v-8.533h51.2v8.533c0.033,10.813,6.868,20.435,17.067,24.027v131.145    c-10.199,3.592-17.033,13.214-17.067,24.028v8.533h-51.2v-8.533C230.37,406.029,223.535,396.407,213.337,392.815z M68.27,246.176    c-4.711-0.005-8.529-3.822-8.533-8.533v-8.533h68.267v8.533c-0.005,4.711-3.822,8.529-8.533,8.533H68.27z M110.936,263.242v128    H76.803v-128H110.936z M128.003,261.67c3.151-1.119,6.05-2.847,8.533-5.086c2.483,2.239,5.383,3.967,8.533,5.085v131.145    c-3.151,1.119-6.05,2.847-8.533,5.086c-2.483-2.239-5.383-3.967-8.533-5.086V261.67z M145.07,416.842    c0.005-4.711,3.823-8.529,8.533-8.533h51.2c4.711,0.005,8.529,3.822,8.533,8.533v8.533H145.07V416.842z M162.136,391.242v-128    h34.133v128H162.136z M204.803,246.176h-51.2c-4.711-0.005-8.529-3.822-8.533-8.533v-8.533h68.267v8.533    C213.332,242.353,209.514,246.171,204.803,246.176z M298.67,416.842c0.005-4.711,3.822-8.529,8.533-8.533h51.2    c4.711,0.005,8.529,3.822,8.533,8.533v8.533H298.67V416.842z M315.736,391.242v-128h34.133v128H315.736z M358.403,246.176h-51.2    c-4.711-0.005-8.529-3.822-8.533-8.533v-8.533h68.267v8.533C366.932,242.353,363.114,246.171,358.403,246.176z M366.936,261.67    c3.151-1.119,6.05-2.847,8.533-5.086c2.483,2.239,5.383,3.967,8.533,5.085v131.145c-3.151,1.119-6.05,2.847-8.533,5.086    c-2.483-2.239-5.383-3.967-8.533-5.086V261.67z M384.003,416.842c0.005-4.711,3.823-8.529,8.533-8.533h51.2    c4.711,0.005,8.529,3.822,8.533,8.533v8.533h-68.267V416.842z M401.07,391.242v-128h34.133v128H401.07z M35.403,175.642    l-13.167-13.167l233.767-142.65l233.767,142.65l-13.167,13.167l-216.125-133c-2.744-1.692-6.206-1.692-8.95,0L35.403,175.642z     M447.72,177.909H64.286L256.003,59.93L447.72,177.909z M56.478,212.042l-8.533-17.067h416.117l-8.533,17.067H56.478z     M59.736,416.842c0.005-4.711,3.822-8.529,8.533-8.533h51.2c4.711,0.005,8.529,3.822,8.533,8.533v8.533H59.736V416.842z     M494.936,493.642H17.07v-8.533c0.005-4.711,3.822-8.529,8.533-8.533h179.2c4.713,0,8.533-3.82,8.533-8.533    s-3.821-8.533-8.533-8.533H42.67v-8.533c0.099-4.802,4.064-8.619,8.867-8.533H460.47c4.802-0.085,8.768,3.731,8.867,8.533v8.533    H307.203c-4.713,0-8.533,3.82-8.533,8.533s3.82,8.533,8.533,8.533h179.2c4.711,0.005,8.529,3.822,8.533,8.533V493.642z"></path>
                    <path d="M256.003,88.309c-18.843,0.02-34.113,15.29-34.133,34.133c0,18.851,15.282,34.133,34.133,34.133    c18.851,0,34.133-15.282,34.133-34.133S274.854,88.309,256.003,88.309z M256.003,139.509c-9.426,0-17.067-7.641-17.067-17.067    s7.641-17.067,17.067-17.067c9.421,0.011,17.056,7.645,17.067,17.067C273.07,131.868,265.429,139.509,256.003,139.509z"></path>
                </svg>
              </template>

              Prefeituras
            </BreezeNavLink>
          </li>

          <!-- <li class="relative px-6 py-3">
            <BreezeNavLink :href="route('about')" :active="route().current('about')">
              <template #icon>
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path
                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
              </template>
              About us
            </BreezeNavLink>
          </li> -->

        <!-- <li class="relative px-6 py-3">
          <button @click="showingTwoLevelMenu = !showingTwoLevelMenu"
              class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
              aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Two-level menu</span>
                </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
          </button>
            <ul v-show="showingTwoLevelMenu" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                aria-label="submenu">
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="#">Child menu</a>
              </li>
            </ul>
        </li> -->
        </ul>
      </div>
    </aside>
  </transition>
</template>

<script>
import BreezeNavLink from '@/Components/NavLink.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

export default {
  components: {
    BreezeNavLink,
    Link,
  },

  setup() {
    let showingTwoLevelMenu = ref(false)

    return {
      showingTwoLevelMenu
    }
  },
}
</script>