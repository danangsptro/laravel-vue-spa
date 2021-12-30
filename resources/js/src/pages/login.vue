<template>
    <div class="container test mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div
                        class="card-header"
                        style="background: black; color: white"
                    >
                        <h4 class="text-center">Login User</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="text"
                                v-model="email"
                                class="form-control"
                                id="email"
                                placeholder="Your Email"
                            />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                v-model="password"
                                class="form-control"
                                id="password"
                                placeholder="Your Password"
                            />
                        </div>
                        <br />
                        <button
                            @click="Submit()"
                            type="button"
                            class="btn btn-dark"
                        >
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            data: [],
            email: "",
            password: "",
            token: localStorage.getItem("_token"),
        };
    },

    created() {
        if (this.token) {
            this.$router.push({ name: "home" });
        }
    },

    methods: {
        async Submit() {
            let params = {
                email: this.email,
                password: this.password,
            };
            let post = await axios.post(`/api/login/`, params);
            console.log(post.data.content.access_token);
            if (post.status) {
                localStorage.setItem("_token", post.data.content.access_token);
                window.location.href = "/home";
            }
        },
    },
};
</script>

<style scoped>
.test {
    padding: 18rem;
}
</style>
