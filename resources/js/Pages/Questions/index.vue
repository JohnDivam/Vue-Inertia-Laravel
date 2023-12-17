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
                <th scope="col">Question</th>
                <th scope="col">Anwsers</th>
                <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(question) in questions" :key="question.id">
                    <th scope="row">{{question.id}}</th>
                    <td>{{question.name}}</td>
                    <td>
                        <span v-for="(answer) in question.answers" :key="answer.id" class="badge badge-warning text-dark">
                            {{answer.answer}}
                        </span>
                    </td>
                    <td>@mdo</td>
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
                    <div v-if="success" class="alert alert-success">
                        {{success}}
                    </div>
                     <div v-if="info" class="alert alert-info">
                        {{info}}
                    </div>
                     <div v-if="error" class="alert alert-danger">
                        {{error}}
                    </div>
                    <div class="form-group">
                        <label> Question </label>
                        <input type="text"   v-model="questionName" name="question" class="form-control">
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>Answers</th>
                                    <th>Correct?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(answer,index) in questionAnswsers" :key="index">
                                    <td>{{answer.id}}</td>
                                    <td>
                                        <input type="text" v-model="answer.answer" name="anwser" class="form-control">
                                    </td>
                                    <td>
                                        <label>
                                            <input :checked="answer.isCorrect"  :value="answer.id" @change="HangeChangeIsCorrect(answer.id)"
                                                type="radio" class="form-check-input" name="isCorrect" >
                                            Yes
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </form>
            </template>
            <template #footer>
                <div class="form-group d-flex flex-row "> 
                        <button  class="btn btn-sm" @click="addAnwserToArray"  v-if="questionAnswsers.length < 6">
                            <h3>+ </h3>
                        </button>
                        &nbsp;
                        <button @click="showModal = false" type="button" class="btn btn-secondary"> close </button>
                        &nbsp;
                        <button @click="createQuestion"
                             type="button" class="btn btn-success" :disabled="questionAnswsers.length < 2">
                            Save!
                        </button>
                    </div>
            </template>
        </modal>
    </Teleport>


   </Layout>
</template>

<script>
import Layout from "@/Shared/Layout.vue"
import Modal from '@/Shared/Modal.vue'
import axios from 'axios';
import { ref, computed } from 'vue'
import { usePage , router} from '@inertiajs/vue3'



export default {
     components:{
        Layout,
        Modal
    },
    props:{
        questions: Object
    },
    setup(){
        const showModal  = ref(false);
        const questionName = ref(null);
        const questionAnswsers = ref([]);
        
        let answerIndex = 1;

        const showCreateModal = () => {
            showModal.value = true;
        }

        const addAnwserToArray = () => {
            const newAnswer = {
                id: answerIndex++,
                answer: '',
                isCorrect: 0
            }
           questionAnswsers.value.push(newAnswer);
        };

        const HangeChangeIsCorrect = (id) => {
            questionAnswsers.value.forEach(answer => {
                answer.isCorrect = (answer.id == id) ? 1 : 0
            });
        };

        const createQuestion = () => {
            router.post('/questions/store',{
                    question: questionName.value,
                    answsers: questionAnswsers.value
                }
            )

            router.on('success',()=>{
                questionName.value = null;
                questionAnswsers.value = [];
            });
        }   

        const page = usePage();
        const success = computed(() => page.props.flash.success);

        return {
            showModal,
            showCreateModal,
            questionName,
            questionAnswsers,
            addAnwserToArray,
            createQuestion,
            HangeChangeIsCorrect,
            success
        }
    }
}
</script>