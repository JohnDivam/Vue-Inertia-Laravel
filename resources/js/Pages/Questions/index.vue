<template>
    <Layout>
    <div class="pt-50 pb-50">
     <div class="container">
        <div class="d-flex flex-row-reverse mb-3">
            <button class="btn btn-success" @click="openModal">Create New</button>
        </div>
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
        </table>
     </div>
    </div>

    <teleport to="body">
        <QuestionsCreate :showModal="showModal"  @close="showModal = false"></QuestionsCreate>
    </teleport>

   </Layout>
</template>

<script>
import Layout from "@/Shared/Layout.vue"
import QuestionsCreate from "@/Pages/Questions/create.vue"
import { ref } from 'vue'


export default {
    components:{
        QuestionsCreate
    },
    components:{
        Layout,
    },
    setup(){
        const showModal  = ref(false);

        const openModal = () => {
            showModal.value = true;
        }

        return {
            showModal,
            openModal
        }
    }
}
</script>