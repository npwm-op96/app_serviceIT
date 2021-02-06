<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col lg="2" md="2" sm="2">
                    <v-card color="success" class="mx-auto" max-width="200">
                        <v-card-text>
                            <div>
                                <v-progress-linear
                                color="#FC427B"
                                    v-model="count_user_p"
                                    value=""
                                ></v-progress-linear>
                            </div>
                            <p class="display-1 text--primary">
                                {{ count_user }}
                            </p>
                            <!-- <p>adjective</p> -->
                            <div class="text--primary"></div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                text
                                color="#fff"
                                @click="reveal = true"
                            >
                                Users
                            </v-btn>
                        </v-card-actions>

                        <v-expand-transition>
                            <v-card
                                v-if="reveal"
                                class="transition-fast-in-fast-out v-card--reveal"
                                style="height: 100%;"
                            >
                                <v-card-text class="pb-0">
                                    <p class="display-1 text--primary">
                                        Origin
                                    </p>
                                </v-card-text>
                                <v-card-actions class="pt-0">
                                    <v-btn
                                        text
                                        color="teal accent-4"
                                        @click="reveal = false"
                                    >
                                        Close
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-expand-transition>
                    </v-card>
                </v-col>
                <v-col lg="2" md="2" sm="2">
                    <v-card color="#1B9CFC" class="mx-auto" max-width="200">
                        <v-card-text>
                            <div>
                                <v-progress-linear
                                color="#EAB543"
                                    v-model="count_emp_p"
                                    value=""
                                ></v-progress-linear>
                            </div>
                            <p class="display-1 text--primary">
                                {{ count_emp }}
                            </p>
                            <!-- <p>adjective</p> -->
                            <div class="text--primary"></div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                text
                                color="#fff"
                                @click="reveal = true"
                            >
                                Employee
                            </v-btn>
                        </v-card-actions>

                        <!-- <v-expand-transition>
                            <v-card
                                v-if="reveal"
                                class="transition-fast-in-fast-out v-card--reveal"
                                style="height: 100%;"
                            >
                                <v-card-text class="pb-0">
                                    <p class="display-1 text--primary">
                                        Origin
                                    </p>
                                </v-card-text>
                                <v-card-actions class="pt-0">
                                    <v-btn
                                        text
                                        color="teal accent-4"
                                        @click="reveal = false"
                                    >
                                        Close
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-expand-transition> -->
                    </v-card>
                </v-col>
                <v-col lg="2" md="2" sm="2">
                    <v-card color="#FD7272" class="mx-auto" max-width="200">
                        <v-card-text>
                            <div>
                                <v-progress-linear
                                color="#3B3B98"
                                    v-model="count_dv_p"
                                    value=""
                                ></v-progress-linear>
                            </div>
                            <p class="display-1 text--primary">
                                {{ count_dv }}
                            </p>
                            <!-- <p>adjective</p> -->
                            <div class="text--primary"></div>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                text
                                color="#fff"
                                @click="reveal = true"
                            >
                                Device
                            </v-btn>
                        </v-card-actions>

                        <!-- <v-expand-transition>
                            <v-card
                                v-if="reveal"
                                class="transition-fast-in-fast-out v-card--reveal"
                                style="height: 100%;"
                            >
                                <v-card-text class="pb-0">
                                    <p class="display-1 text--primary">
                                        Origin
                                    </p>
                                </v-card-text>
                                <v-card-actions class="pt-0">
                                    <v-btn
                                        text
                                        color="teal accent-4"
                                        @click="reveal = false"
                                    >
                                        Close
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-expand-transition> -->
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>
<script>
export default {
    data() {
        return {
            reveal: false,
            count_user: "",
            count_user_p: "",
            count_emp: "",
            count_emp_p: "",
            count_dv: "",
            count_dv_p: "",
        };
    },

    created() {
        axios.get("/api/GetUsers").then(response => {
            // console.log(response.data.data.length);
            this.count_user = response.data.length;
            this.count_user_p = response.data.length;
            // console.log(count_emp)
        });
             axios.get("/api/GetEmployee").then(response => {
            // console.log(response.data.data.length);
            this.count_emp = response.data.length;
            this.count_emp_p = response.data.length;
            // console.log(count_emp)
        });
            axios.get("/api/count_device").then(response => {
            // console.log(response.data.data.length);
            this.count_dv = response.data.length;
            this.count_dv_p = response.data.length;
            // console.log(count_emp)
        });
    },

    methods: {}
};
</script>
