<template>
    <div>
        <navbar />
        <div class="container mt-4">
            <div class="card">
                <h3 class="text-center">Form Input Produk</h3>

                <div v-show="state == 0">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="wiw" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1">Sub Product</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button class="btn btn-dark" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 1">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="wiw" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="wuw" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="exampleInputEmail1"
                                    >Link Image</label
                                >
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                        <br />
                        <hr style="border: 1px solid black;" />
                        <div class="text-right">
                            <button class="btn btn-warning">+</button>
                        </div>
                        <label for="exampleInputEmail1" class="mt-3"
                            >Product Name</label
                        >
                        <input type="text" class="form-control" />

                        <label for="exampleInputEmail1" class="mt-3"
                            >Quantity</label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 0 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 0">
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 2 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 2">
                                    <button class="btn btn-dark" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 2">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="wiw" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="wuw" width="20%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="wew" width="20%" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1" class="mt-3"
                            >Penanggung jawab </label
                        >
                        <input type="text" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button class="btn btn-success" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import navbar from "../../components/navbar.vue";
import centang from "../../assets/images/centang.png";
import centang2 from "../../assets/images/we.png";
import roboy from "../../assets/images/roboy.png";

export default {
    components: {
        navbar,
    },

    data() {
        return {
            wew: centang,
            wuw: centang2,
            wiw: roboy,
            state: 0,
            disable: 0
        };
    },
};
</script>

<style scoped lang="scss">
.card {
    width: 100%;
    height: 100%;
    background-color: #ffffff;
    border-radius: 2rem;
    border: 2px solid black;
    box-shadow: black 0px 0px 8px;
    padding: 4rem;
}

.box {
    border: 3px solid rgb(104, 110, 13);
    box-shadow: rgb(104, 110, 13) 0px 0px 5px;

    &-kotak {
        border: 1px solid rgb(104, 110, 13);
        padding: 1rem;
    }
}

.text-right {
    text-align: right;
    margin-top: 1rem;
}
</style>
