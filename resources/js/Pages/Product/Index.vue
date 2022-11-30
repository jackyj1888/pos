<script setup>
import AppLayoutVue from '../../Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '../../Components/DialogModal.vue';
import InputLabel from '../../Components/InputLabel.vue';
import TextInput from '../../Components/TextInput.vue';
import SecondaryButton from '../../Components/SecondaryButton.vue';
import ImputError from '../../Components/InputError.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const data = defineProps({
    products: Array,
    categories : Array,
    user: Object,
    q: String,
    category:Object,
    product : Object,
    showDialogShow: Boolean,
    showDialogForm : Boolean
});

//const showDialogShow = ref(false);  
//const showDialogCreate = ref(false);
//const showDialogUpdate = ref(false);
const showDialogDelete = ref(false);

const form = useForm({
    user_id : data.user.id,
    category_id :data.product?.category_id ?? '',
    name:data.product?.name ?? '',
    price:data.product?.price ?? '',
    stock:data.product?.stock ?? '',
});

const enviarEditar = ()=>{
    console.log('hola');
}
const enviarEliminar = ()=>{
    console.log('hola');
}

const enviarForm = ()=>{

    if(data.product){
        form.put(route('product.update',data.product.id),{
            onSuccess :() => {
                Inertia.visit(route('product.index'));
            }
        });
    }else{
        form.post(route('product.store'), {
        onSuccess :() => {
            data.showDialogForm = false;
            form.reset();
    }});
    }
    
    /*console.log('hola');*/
}


const cancelarForm = () => {
    data.showDialogForm = false;
    Inertia.visit(route('product.index'));
}
const enviarBuscar = () => {
    Inertia.visit(route('product.index', {q : data.q}));
}
const enviarMostrar = (id) => {

    Inertia.visit(route('product.index', {show : id}, {
        onSuccess : () => {
            showDialogShow.value = true;
        }
    }));
}
const cancelarMostrar = () => {
    Inertia.visit(route('product.index'));
}

const mostrarEditar = (id) => {
    Inertia.visit(route('product.index', {edit : id}));
}

</script>
<template >
    <AppLayoutVue>
        <template #header>
            Página Producto
            <SecondaryButton class="m-2 px-3 bg-indigo-500 hover:bg-indigo-700 rounded"  as="button" @click="showDialogForm=true"> Nuevo </SecondaryButton>
        </template>
        
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
            <ActionSection>
                <template #title> Lista de Productos </template>
                <template #description> descripcion </template>
                <template #content>
                    <TextInput type="text" name="q" id="q" v-model="q" class="w-full mb-2" @change="enviarBuscar" ></TextInput>
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th> NOMBRE  </th>
                            <th> Precio  </th>
                            <th> Cantidad  </th>
                            <th> Ver  </th>
                            <th> Editar  </th>
                            <th> Eliminar  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="datos in products">
                            <td> {{datos.name}} </td>
                            <td> {{datos.price}} </td>
                            <td> {{datos.stock}} </td>
                            <td>
                                 <SecondaryButton class="m-2 px-3 bg-indigo-500 hover:bg-indigo-700 rounded" @click="enviarMostrar(datos.id)"> 
                                    Ver </SecondaryButton> 
                            </td>
                            <td>
                                <SecondaryButton class="m-2 px-3 bg-orange-500 hover:bg-orange-700 rounded" @click="mostrarEditar(datos.id)"> 
                                    Editar </SecondaryButton> 
                            </td>
                            <td>
                                <SecondaryButton class="m-2 px-3 bg-red-500 hover:bg-red-700 rounded" @click="showDialogDelete=true"> 
                                    Eliminar </SecondaryButton> 
                            </td>
                        </tr>
                    </tbody>
            </table>
            </template>
            </ActionSection>
        </div>          
    </AppLayoutVue>
    <DialogModal v-bind:show="showDialogShow">
        <template #title>Mostrar Producto</template>
        <template #content>
            <p>Nombre: {{product?.name ?? ''}}</p>
            <p>Precio: {{product?.price ?? ''}}</p>
            <p>Cantidad: {{product?.stock ?? ''}}</p>
        </template>
        <template #footer>
            <SecondaryButton @click="cancelarMostrar">Cancelar</SecondaryButton>
        </template>
    </DialogModal>
    <DialogModal v-bind:show="showDialogForm">
        <template #title>{{ product ? 'Editar Producto' : 'Nuevo Producto'}}</template>
        <template #content>
          <form @submit.prevent="enviarForm()"> 
            <div class="grid grid-cols-6 gap-6"> 
                    
                    <div class="col-span-6 sm:col-span-4 ">
                        <InputLabel for="category" value="Categoria"/>
                        <select name="category" id="category" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                         v-model="form.category_id">
                            <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                        </select>
                        <InputError v-bind:message="form.errors.category_id"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="name">Nombre</InputLabel>
                        <TextInput type="text" name="name" id="name"  class="w-full" v-model="form.name" ></TextInput>
                        <InputError v-bind:message="form.errors.name"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="price" value="Precio"/>
                        <TextInput type="number" name="price" id="price"  class="w-full" v-model="form.price" ></TextInput>
                        <InputError v-bind:message="form.errors.price"></InputError>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="stock" value="Stock"/>
                        <TextInput type="number" name="stock" id="stock"  class="w-full" v-model="form.stock"></TextInput>
                        <InputError v-bind:message="form.errors.stock"></InputError>
                    </div>
                </div>
                <div class="col-span-6 text-end">
                    <PrimaryButton class="mr-2">{{ product ? 'Editar' : 'Guardar'}}</PrimaryButton>
                    <SecondaryButton @click="cancelarForm">Cancelar</SecondaryButton>
                </div>
            </form>     
        </template>
       
    </DialogModal>
    
    <DialogModal v-bind:show="showDialogDelete">
        <template #title>Eliminar Producto</template>
        <template #content>Formulario</template>
        <template #footer>
            <SecondaryButton @click="showDialogDelete=false">Cancelar</SecondaryButton>
        </template>
    </DialogModal>
</template>