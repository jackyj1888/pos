<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import ActionSection from '@/Components/ActionSection.vue';
    import {Link} from '@inertiajs/inertia-vue3';
    import DialogModal from '../../Components/DialogModal.vue';
    import SecondaryButton from '../../Components/SecondaryButton.vue'
    import { ref } from 'vue';

    defineProps({
        datos:Object
    });
    const showDialog = ref(false);
    const mostrar = () => {
        showDialog.value=true;
    }
    const ocultar = () => {
        showDialog.value = false;
    }
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
                        <p>Nombre:{{datos.name}}</p>
                        <p>Tipo:{{datos.type}}</p>
                        <Link class= "inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs
                         text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none
                         focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" 
                        v-bind:href="route('category.index')" as="button"> Volver </Link> 
                        <SecondaryButton class= "m-5 bg-slate-400 hover:bg-slate-600" @click="mostrar">Eliminar</SecondaryButton>
                    </template>
                </ActionSection>
            </div>
        </template>
    </AppLayout>

    <DialogModal v-bind:show="showDialog">
        <template #title>Titulo borrar</template>
        <template #content>Está seguro de eliminar {{datos.name}}?</template>
        <template #footer>
            <SecondaryButton>Si</SecondaryButton>
            <SecondaryButton @click="ocultar">No</SecondaryButton>
        </template>
    </DialogModal>
</template>