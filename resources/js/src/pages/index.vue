<template>
    <div>
        <navbar />
        <div class="row container mt-4 justify-content-center">
            <div class="col-lg-6" style="text-align-left">
                <img :src="test" width="90%" />
            </div>
            <div class="col-lg-6 card">
                <div class="card-text">
                    <img :src="imgForm" width="30%" /><br /><br />
                    <p>Silahkan klik di bawah ini !</p>
                    <button class="btn btn-dark">
                        <router-link to="/form" class="text-decoration">
                            Klik disini
                        </router-link>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import navbar from "../components/navbar.vue";
import formImg from "../assets/images/5-formpembukaanrekening.png";
import images from "../assets/images/undraw_Welcome_re_h3d9.png";
export default {
    components: {
        navbar,
    },

    data() {
        return {
            test: images,
            imgForm: formImg,
        };
    },
};
</script>

<style scoped lang="scss">
.card {
    text-align: center;
    border-radius: 4rem;
    background: rgb(192, 33, 33);
    width: 400px;
    height: 400px;
    padding: 10px;
    box-shadow: 1px 0px 11px 1px rgb(250, 55, 55);
    margin-top: 2rem;

    &-text {
        color: white;
        font-size: 24px;
        margin-top: 4rem;
        font-family: "Roboto";
    }
    .text-decoration {
        text-decoration: none;
        color: white;
    }
}
</style>
