<template>
    <div>
        <b-button @click="$bvModal.show('modal-scoped')">Open Modal</b-button>
        <div
            class="d-flex justify-content-center spinner-borderD"
            v-if="popupActivo"
        >
            <div class="spinner-border text-warning" role="status">
            </div>
        </div>
        <b-modal id="modal-scoped" ref="closeModal">
            <template #modal-header="{ close }">
                <h5>Create Data</h5>
                <b-button size="sm" variant="outline-danger" @click="close()">
                    x
                </b-button>
            </template>

            <div class="form-group">
                <label class="col-form-label">Name:</label>
                <input type="text" v-model="posts.name" class="form-control" />
            </div>
            <div class="form-group">
                <label class="col-form-label">Umur:</label>
                <input type="text" v-model="posts.umur" class="form-control" />
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Alamat:</label>
                <input
                    type="text"
                    v-model="posts.alamat"
                    class="form-control"
                />
            </div>
            <div class="form-group">
                <label class="col-form-label">Pekerjaan:</label>
                <input
                    type="text"
                    v-model="posts.pekerjaan"
                    class="form-control"
                />
            </div>

            <template #modal-footer="{ ok, cancel }">
                <b-button size="sm" variant="success" @click="saveCreate()">
                    submits
                </b-button>
                <b-button size="sm" variant="danger" @click="cancel()">
                    Cancel
                </b-button>
            </template>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            popupActivo: false,
        };
    },
    methods: {
        async saveCreate() {
            const params = {
                name: this.posts.name,
                umur: this.posts.umur,
                alamat: this.posts.alamat,
                pekerjaan: this.posts.pekerjaan,
            };
            this.popupActivo = true;
            axios
                .post("/api/backend/post/", params)
                .then((response) => {
                    const data = response.data.data;
                    this.$emit("addItem", data);
                    this.posts.push(data);
                    this.$refs.closeModal.hide();
                    setTimeout(() => {
                        this.popupActivo = false;
                    }, 5000);
                })
                .catch((e) => {
                    this.errors.push(e);
                });
        },
    },
};
</script>

<style scoped>
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
