<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import ActionSection from '@/Components/ActionSection.vue';
    import {Link} from '@inertiajs/inertia-vue3';

    defineProps({
        datos:Object
    });
</script>
<template>
    <AppLayout>
        <template #header> TÍTULO  </template>
        <template #default>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                <ActionSection>
                    <template #title>Categoría</template>
                    <template #description>Descripción</template>
                    <template #content>
                        <p>{{datos.name}}</p>
                        <p>{{datos.type}}</p>
                        <Link class= "m-5 bg-slate-400 hover:bg-slate-600" v-bind:href="route('category.index')" as="button"> Volver </Link> 
                    </template>
                </ActionSection>
            </div>
        </template>
    </AppLayout>
</template>