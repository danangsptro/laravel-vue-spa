<template>
    <div>
        <navbar />
        <div class="container">
            <h1>Form</h1>
            <div
                class="d-flex justify-content-center spinner-borderD"
                v-if="popupActivo"
            >
                <div class="spinner-border text-warning" role="status"></div>
            </div>
            <create-form @addItem="addItem"> </create-form>

            <!-- Add Edit -->
            <div class="row mb-4">
                <div class="col-lg-4" v-if="stateEdit === 'edit'">
                    <label for="exampleInputEmail1">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="put.name"
                    />
                    <label for="exampleInputEmail1">Umur</label>
                    <input
                        type="number"
                        class="form-control"
                        v-model="put.umur"
                    />
                    <label for="exampleInputEmail1">Alamat</label>
                    <input
                        type="text"
                        class="form-control mb-3"
                        v-model="put.alamat"
                    />
                    <label for="exampleInputEmail1">Pekerjaan</label>
                    <input
                        type="text"
                        class="form-control mb-3"
                        v-model="put.pekerjaan"
                    />
                    <button class="btn btn-success" @click="updateData()">
                        Save
                    </button>
                    <button
                        class="btn btn-danger"
                        v-if="stateEdit === 'edit'"
                        @click="changeEdit('defaultEdit')"
                    >
                        Cancel
                    </button>
                </div>
            </div>
            <!-- Close Edit -->


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
                                @click="onEdit(d, index)"
                                v-if="stateEdit === 'defaultEdit'"
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
            stateEdit: "defaultEdit",
            put: {
                name: "",
                umur: "",
                alamat: "",
                pekerjaan: "",
            },
            idEdit: null,
            indexEdit: null,
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
        onEdit(item, index) {
            this.put.name = item.name;
            this.put.umur = item.umur;
            this.put.alamat = item.alamat;
            this.put.pekerjaan = item.pekerjaan;
            this.idEdit = item.id;
            this.indexEdit = index;
            this.stateEdit = "edit";
        },

        async updateData() {
            try {
                this.popupActivo = true;
                await axios
                    .put(`api/backend/update/${this.idEdit}`, {
                        name: this.put.name,
                        umur: this.put.umur,
                        alamat: this.put.alamat,
                        pekerjaan: this.put.pekerjaan,
                    })
                    .then((response) => {
                        const data = response.data.data;
                        this.posts[this.indexEdit].name = data.name;
                        this.posts[this.indexEdit].umur = data.umur;
                        this.posts[this.indexEdit].alamat = data.alamat;
                        this.posts[this.indexEdit].pekerjaan = data.pekerjaan;
                        setTimeout(() => {
                            this.popupActivo = false;
                        }, 5000);
                        this.idEdit = null;
                        this.indexEdit = null;
                        this.stateEdit = "defaultEdit";
                    });
            } catch (error) {
                throw error;
            }
        },
        changeEdit(newEdit) {
            this.stateEdit = newEdit;
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
