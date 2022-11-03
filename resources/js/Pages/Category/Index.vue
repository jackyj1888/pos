<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
import {Link} from '@inertiajs/inertia-vue3';
defineProps({
    categories: Array,
});
</script>
<template >
    <AppLayoutVue>
        <template #header>
            Página Categoría
            <Link class="m-2 px-3 bg-indigo-500 hover:bg-indigo-700 rounded" v-bind:href="route('category.create')" as="button"> Nuevo </Link>
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
                        <tr class="text-left">
                            <th> NOMBRE  </th>
                            <th> TIPO  </th>
                            <th> ACCCION  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="datos in categories">
                            <td> {{datos.name}} </td>
                            <td> {{datos.type}} </td>
                            <td>
                                 <Link class="m-2 px-3 bg-indigo-500 hover:bg-indigo-700 rounded" v-bind:href="route('category.show',datos.id)" as="button"> Ver </Link> 
                            </td>
                        </tr>
                    </tbody>
            </table>
            </template>
            </ActionSection>
        </div>          
    </AppLayoutVue>
    
</template>