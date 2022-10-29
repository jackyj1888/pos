<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
defineProps({
    categories: Array,
});
</script>
<template >
    <AppLayoutVue>
        <template #header>
            Página Categoría - Index
        </template>
        <!--  Mostraría todslos datos de la tabla
            <p v-for="datos in categories">{{datos}}</p>
        <p v-for="datos in categories">{{datos.type}}</p> -->
        <!--<div v-for="datos in categories">
            <p>{{datos.name}}</p>  <p>{{datos.type}}</p>-->
           <!-- <p> Nombre: {{datos.name}} Tipo: {{datos.type}}</p> 
        </div>-->
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
            <ActionSection>
                <template #title> Lista de categorías </template>
                <template #description> descripcion </template>
                <template #content>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>
                                NOMBRE
                            </th>
                            <th>
                                TIPO
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="datos in categories">
                            <td>
                                {{datos.name}}
                            </td>
                            <td>
                                {{datos.type}}
                            </td>
                        </tr>
                    </tbody>
            </table>
            </template>
            </ActionSection>
        </div>          
    </AppLayoutVue>
    
</template>