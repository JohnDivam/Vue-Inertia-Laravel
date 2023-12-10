<template>
    <Layout>
    <div class="pt-50 pb-50">
     <div class="container">
        <div class="d-flex flex-row-reverse mb-3">
            <button class="btn btn-success"  @click="showCreateModal()">Create New</button>
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


    <Teleport to="body">
        <modal :show="showModal" @close="showModal = false">
            <template #header>
                <h3>Create new question</h3>
            </template>
            <template #body>
                <form action="" method="post">
                    <div class="form-group">
                        <label> Question </label>
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="form-group d-flex flex-row-reverse ">
                        <button type="submit" class="btn btn-success ml-auto">Save!</button>
                    </div>
                </form>
            </template>
            <template #footer>
                <div></div>
            </template>
        </modal>
    </Teleport>


   </Layout>
</template>

<script>
import Layout from "@/Shared/Layout.vue"
import Modal from '@/Shared/Modal.vue'
import { ref } from 'vue'


export default {
     components:{
        Layout,
        Modal
    },
    setup(){
        const showModal  = ref(false);

        const showCreateModal = () => {
            showModal.value = true;
        }

        return {
            showModal,
            showCreateModal
        }
    }
}
</script>