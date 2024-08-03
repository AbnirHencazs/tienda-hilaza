
<script setup>
import BreezeButton from '@/Components/Button.vue';
import { router } from '@inertiajs/vue3'

function redirectToHome() {
    router.visit('/');
}
</script>

<template>
    <div class="w-full h-screen bg-not-found bg-no-repeat bg-contain md:bg-cover md:bg-center">
        <div class="flex flex-col justify-items-center items-center">
             <span class="text-center mb-4 text-4xl">La página que buscabas no existe, puedes regresar al inicio.</span>
            <BreezeButton :type="'button'" @handle-click="redirectToHome">
                Ir al inicio
            </BreezeButton>
        </div>
    </div>
</template>