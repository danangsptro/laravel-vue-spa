<template>
    <div>
        <navbar />
        <div class="container">
            <h1>Form</h1>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-color">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(d, id) in data" :key="id">
                        <th scope="row">{{id +1}}</th>
                        <td>{{d.name}}</td>
                        <td>{{d.umur}}</td>
                        <td>{{d.alamat}}</td>
                        <td>{{d.pekerjaan}}</td>
                        <td>
                            <button type="button"  class="btn btn-secondary mb-3">Edit</button>
                            <button type="button" class="btn btn-danger mb-3">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import navbar from "../components/navbar.vue";
import axios from "axios";

export default {
    components: {
        navbar,
    },

    data() {
        return {
            data: [],
        };
    },

    created() {
        this.getData();
    },

    methods: {
        async getData() {
            try {
                let data = await axios.get("/api/backend");
                let result = data.data.data;
                this.data = result;
            } catch (error) {
                throw error;
            }
        },
    },
};
</script>

<style scoped>
.bg-color{
    background-color: #4b4949;
    color: white;
}
.table{
    margin-top: 4rem;
    text-align: center;
    border: 1px solid black;
}
</style>
