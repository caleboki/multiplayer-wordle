<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// Define a reactive variable to store the list of users
import { ref } from 'vue';
const users = ref([]);

// Fetch the list of users and their scores from the API
fetch('/api/scores')
    .then(response => response.json())
    .then(data => {
        // Update the reactive variable with the retrieved data
        users.value = data;
        console.log(data)
    });
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight text-white">Leaderboard</h2>
    </template>

    <!-- <div class="flex justify-center mb-8">
            <inertia-link
                href="/game"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Start Playing
            </inertia-link>
    </div> -->
    <div class="flex justify-center mt-4">
        <a
            href="/game"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
            Play Now!
        </a>
    </div>

    <div class="flex justify-center">
      <table class="table-auto border-collapse border border-gray-300 rounded-lg shadow-lg mt-8">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="px-4 py-2">User</th>
            <th class="px-4 py-2">Score</th>
          </tr>
        </thead>
        <tbody class="text-gray-600">
          <tr v-for="(user, index) in users" :key="index" class="bg-white">
            <td class="border border-gray-300 px-4 py-2">{{ user.name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ user.total_score }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </AuthenticatedLayout>
</template>
