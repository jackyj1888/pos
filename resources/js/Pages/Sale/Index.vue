<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
import TextInput from '../../Components/TextInput.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import SecondaryButton from '../../Components/SecondaryButton.vue';
import DialogModal from '../../Components/DialogModal.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const showDialogFormNewClient = ref(false);
const formNewClient = useForm({
    'nit':'',
    'name':'',
    'last_name':'',
    'birth_date':'',
});

const sendNewClient = ()=>{
    formNewClient.post(route('client.store'),{
        onSuccess : ()=>{
            showDialogFormNewClient.value=false;
        }
    });
};
</script>

<template>
    <AppLayoutVue>
        <template #header>
            <SecondaryButton class="m-2 px-3 bg-indigo-500 hover:bg-indigo-700 rounded"  
            as="button" @click="showDialogFormNewClient=true"> Nuevo Cliente </SecondaryButton>
        </template>
        
        
        <template #default>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                <ActionSection>
                    <template #title>Titulo</template>
                    <template #description>Descripcion</template>
                    <template #content>Contenido                        
                    </template>
                </ActionSection>
            </div>
        </template>
    </AppLayoutVue>

    <DialogModal v-bind:show="showDialogFormNewClient">
        <template #title>Nuevo Cliente</template>
        <template #content>
            <form @submit.prevent="sendNewClient">
                <div class="grid grid-cols-6 gap-6"> 
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="nit">NIT</InputLabel>
                        <TextInput type="text" name="nit" id="nit"  class="w-full" v-model="formNewClient.nit" ></TextInput>
                        <InputError v-bind:message="formNewClient.errors.nit"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name">Nombre</InputLabel>
                        <TextInput type="text" name="name" id="name"  class="w-full" v-model="formNewClient.name" ></TextInput>
                        <InputError v-bind:message="formNewClient.errors.name"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="last_name">Apellido</InputLabel>
                        <TextInput type="text" name="last_name" id="last_name"  class="w-full" v-model="formNewClient.last_name" ></TextInput>
                        <InputError v-bind:message="formNewClient.errors.last_name"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="birth_date">Fecha Nacimiento</InputLabel>
                        <TextInput type="date" name="birth_date" id="birth_date"  class="w-full" v-model="formNewClient.birth_date" ></TextInput>
                        <InputError v-bind:message="formNewClient.errors.birth_date"></InputError>
                    </div>
                </div>
                <div class="col-span-6 text-end">
                    <PrimaryButton class="mr-2">Guardar</PrimaryButton>
                    <SecondaryButton @click="showDialogFormNewClient=false">No</SecondaryButton>
                </div>
            </form>
        </template>    
        
    </DialogModal>
</template>