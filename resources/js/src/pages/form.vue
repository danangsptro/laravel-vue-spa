<template>
    <div>
        <navbar />
        <div class="container">
            <h1>Form</h1>
            <div
                class="d-flex justify-content-center spinner-borderD"
                v-if="popupActivo"
            >
                <div class="spinner-border text-warning" role="status">
                </div>
            </div>
            <create-form @addItem="addItem"> </create-form>
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
                    <tr v-for="(d, index) in posts" :key="index">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ d.name }}</td>
                        <td>{{ d.umur }}</td>
                        <td>{{ d.alamat }}</td>
                        <td>{{ d.pekerjaan }}</td>
                        <td>
                            <button
                                type="button"
                                class="btn btn-secondary mb-3"
                            >
                                Edit
                            </button>
                            <button
                                type="button"
                                class="btn btn-danger mb-3"
                                @click="deleteData(d.id, index)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import createForm from "../components/createForm";
import navbar from "../components/navbar.vue";
import axios from "axios";

export default {
    components: {
        navbar,
        createForm,
    },

    data() {
        return {
            posts: [],
            popupActivo: false,
        };
    },

    created() {
        this.getData();
    },

    methods: {
        async getData() {
            try {
                let data = await axios.get("/api/backend");
                let result = data.data;
                if (result.status == "success") {
                    this.posts = result.data;
                }
            } catch (error) {
                throw error;
            }
        },

        async deleteData(id, index) {
            try {
                this.popupActivo = true;
                let result = await axios.delete(`/api/backend/delete/${id}`);
                setTimeout(() => {
                    this.popupActivo = false;
                }, 5000);
                if (result.data.status === "success") {
                    this.posts.splice(index, 1);
                }
            } catch (error) {
                throw error;
            }
        },

        addItem(params) {
            this.posts.push(params);
        },
    },
};
</script>

<style scoped>
.bg-color {
    background-color: #4b4949;
    color: white;
}
.table {
    margin-top: 2rem;
    text-align: center;
    border: 1px solid black;
}

.spinner-borderD {
    width: 100%;
    height: 100vh;
    background: rgb(0, 0, 0, 0.6);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10000;
}
.spinner-border {
    margin-top: 20%;
}
</style>
