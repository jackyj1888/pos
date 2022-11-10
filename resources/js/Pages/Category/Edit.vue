<script setup>
    import AppLayoutVue from '../../Layouts/AppLayout.vue';
    import FormSection from '../../Components/FormSection.vue';
    import InputLabel from '../../Components/InputLabel.vue';
    import TextInput from '../../Components/TextInput.vue';
    import InputError from '../../Components/InputError.vue'
    import PrimaryButton from '../../Components/PrimaryButton.vue'
import { useForm } from '@inertiajs/inertia-vue3';

const data = defineProps({
    datos:Object
});    

const form = useForm({
        name:data.datos.name,
        type:data.datos.type
    });

    function enviar() {
        form.put(route('category.update',data.datos.id));
    }
</script>

<template>
    <AppLayoutVue>
        <template #header> Formulario para crear Categoría </template>
        <template #default>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                <FormSection @submitted="enviar()">
                    <template #title>Formulario de Registro</template>
                    <template #description>Descripción</template>
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="name">Nombre</InputLabel>
                            <TextInput type="text" name="name" id="name" v-model="form.name" class="w-full" > </TextInput>
                            <InputError v-bind:message="form.errors.name"></InputError>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="type">Tipo</InputLabel>
                            <TextInput type="text" name="type" id="type" v-model="form.type" class="w-full"></TextInput>
                            <InputError v-bind:message="form.errors.type"></InputError>
                        </div>
                        
                    </template>
                    <template #actions>
                        <PrimaryButton>Guardar</PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </template> 
    </AppLayoutVue>
</template>