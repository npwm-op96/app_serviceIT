<template>
    <v-card class="mx-auto" max-width="500" outlined>
        <v-app-bar color="#2980b9" dark>
            <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

            <v-toolbar-title>Login</v-toolbar-title>
        </v-app-bar>

        <v-card class="">
            <v-card-text>
                <v-form>
                    <v-text-field
                        v-model="email"
                        prepend-icon="person"
                        name="email"
                        label="Login"
                        type="text"
                    ></v-text-field>
                    <v-text-field
                        v-model="password"
                        id="password"
                        prepend-icon="lock"
                        name="password"
                        label="Password"
                        type="password"
                    ></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="login()">Login</v-btn>
            </v-card-actions>
        </v-card>
    </v-card>
</template>

<script type="text/javascript">
export default {
    methods: {
        login() {
           console.log(this.email)
           console.log(this.password)
            axios
                .post("api/auth/login", {
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    this.loginmember =  response.data.loginmember
                    console.log(response.data);
                    this.$router.push("/Dashboard");
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    data() {
        return {
            loginmember:'',
            email: "",
            password: ""
        };
    }
};
</script>
