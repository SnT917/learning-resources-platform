<script setup>
import axios from "axios";
import { ref } from "vue";

let title = ref("");
let description = ref("");
let link = ref("");

function createResource() {
    //console.log(title.value);
    //console.log(description.value);
    //console.log(link.value);

    axios.post("/api/resources", {
        title: title.value,
        description: description.value,
        link: link.value
     })
    .then((response) => {
        console.log(response);
    });
}

</script>

<template>
    <div class="max-w-md mx-auto bg-white p-6 rounded-md">
      <h2 class="text-xl font-semibold mb-4">Crear Nuevo Recurso</h2>
  
      <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-600 mb-1">Título:</label>
        <input v-model="title" type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue">
      </div>
  
      <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Descripción:</label>
        <textarea v-model="description" id="description" name="description" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue"></textarea>
      </div>
  
      <div class="mb-4">
        <label for="link" class="block text-sm font-medium text-gray-600 mb-1">Enlace:</label>
        <input v-model="link" type="text" id="link" name="link" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:shadow-outline-blue">
      </div>
  
      <button @click="createResource" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
        Crear Recurso
      </button>
    </div>
  </template>
  