<template>
    <div>
        <navbar />
        <div class="container">
            <p class="text-form">Form input pendaftaran</p>
            <hr />
            <div
                class="d-flex justify-content-center spinner-borderD"
                v-if="popupActivo"
            >
                <div class="spinner-border text-warning" role="status"></div>
            </div>
            <div class="display">
                <router-link :to="'/productCreate'">
                    <button class="btn btn-dark">Create</button>
                </router-link>
                &nbsp;
                <button class="btn btn-success">
                    <router-link to="/home"
                        ><b-icon
                            icon="caret-left-square-fill"
                            style="width: 50px; color: wheat"
                        ></b-icon
                    ></router-link>
                </button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-color">
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Height</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</template>

<script>
import navbar from "../../components/navbar.vue";

export default {
    components: {
        navbar,
    },

    data() {
        return {
            popupActivo: false,
        };
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

.text-form {
    text-align: center;
    font-weight: bold;
    font-size: 25px;
    padding: 1rem;
}
.display {
    display: flex;
    justify-content: center;
}
</style>
