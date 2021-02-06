<template>
    <v-main>
        <v-container>
            <v-row>
                <v-col cols="12" sm="12" md="2" lg="2">
                    <span>
                        <v-btn
                            small
                            fab
                            color="primary"
                            dark
                            @click.stop="dialog_add_emp = true"
                        >
                            <v-icon>
                                mdi-account-plus
                            </v-icon>
                        </v-btn>
                        <v-btn
                            fab
                            small
                            color="success"
                            dark
                            @click.stop="dialog = true"
                        >
                            <v-icon> import_export </v-icon>
                        </v-btn>
                    </span>
                </v-col>
                <v-col cols="10" sm="4" md="4" lg="4" xs="6">
                    <v-text-field label="ค้นหา" 
                    v-model="Search_emp" 
                    hide-details="auto">
                    </v-text-field>
                </v-col>
<!-- 
                <v-col cols="1" sm="1" md="1" lg="1">
                    <v-btn
                        fab
                        small
                        color="error"
                        dark
                        @click.stop="dialog = true"
                    >
                        <v-icon> youtube_searched_for </v-icon>
                    </v-btn>
                </v-col> -->
                <v-col cols="10" sm="4" md="4" lg="4" xs="6">
                    <v-menu
                        v-model="start_time"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="start_time_s"
                                label="วันเริ่มงาน"
                                prepend-icon="mdi-calendar"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                        </template>

                        <v-date-picker
                            v-model="start_time_s"
                            @input="start_time = false"
                        ></v-date-picker>
                    </v-menu>
                </v-col>
                <v-col cols="1" sm="1" md="1" lg="1">
                    <!-- <v-btn > -->
                    <v-icon
                        color="#grey"
                        fab
                        small
                        v-model="clear_date_btn"
                        @click.prevent="clear_date()"
                    >
                        mdi-close-circle-outline
                    </v-icon>

                    <!-- </v-btn> -->
                </v-col>
            </v-row>
        </v-container>
        <br />
        <v-container class="">
            <v-row class="">
                <v-col cols="12" sm="4" md="2">
                    รหัส
                </v-col>
                <v-col cols="12" sm="4" md="2">
                    ชื่อ
                </v-col>
                <v-col cols="12" sm="4" md="2">
                    หมายเหตุ
                </v-col>
            </v-row>
            <br />
            <v-row
                v-for="GetEmployee in GetEmployees"
                :key="GetEmployee.id_emp"
            >
                <v-col cols="12" sm="4" md="2">
                    {{ GetEmployee.id_emp }}
                </v-col>
                <v-col cols="12" sm="4" md="2">
                    {{ GetEmployee.name }}
                </v-col>
                <v-col cols="12" sm="4" md="6">
                    <v-btn
                        color="primary"
                        fab
                        small
                        dark
                        @click="showdetail_emp(GetEmployee.id_emp)"
                    >
                        <v-icon>
                            mdi-eye
                        </v-icon>
                    </v-btn>
                    <v-btn
                        color="warning"
                        fab
                        small
                        dark
                        @click.prevent="edit_emp(GetEmployee.id_emp)"
                    >
                        <v-icon>
                            mdi-account-edit
                        </v-icon>
                    </v-btn>
                    <v-btn
                        @click.prevent="deleteemp(GetEmployee.id_emp)"
                        @click="delete_cf = true"
                        color="error"
                        fab
                        small
                        dark
                    >
                        <v-icon>
                            mdi-account-remove
                        </v-icon>
                    </v-btn>
                </v-col>
            </v-row>
            <br />
        </v-container>

        <!-- Dialog Add  -->
        <v-row justify="center">
            <v-dialog
                v-model="dialog_add_emp"
                fullscreen
                hide-overlay
                transition="dialog-bottom-transition"
            >
                <v-card>
                    <v-toolbar dark color="primary">
                        <v-btn icon dark @click="dialog_add_emp = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title>เพิ่มรายชื่อพนักงาน</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items>
                            <v-btn dark text @click.prevent="create_emp()">
                                บันทึก
                            </v-btn>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="2">
                                    <v-text-field
                                        id="id_emp"
                                        name="id_emp"
                                        v-model="newemp.id_emp"
                                        label="รหัสพนักงาน"
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="2">
                                    <v-text-field
                                        id="name"
                                        name="name"
                                        v-model="newemp.name"
                                        label="ชื่อพนักงาน"
                                        hint="example of helper text only on focus"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="2">
                                    <v-text-field
                                        id="lastname"
                                        name="lastname"
                                        v-model="newemp.lastname"
                                        label="นามสกุล"
                                        hint="example of persistent helper text"
                                        persistent-hint
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        label="Email*"
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                        label="Password*"
                                        type="password"
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6">
                                    <v-select
                                        id="id_department"
                                        name="id_department"
                                        v-model="newemp.id_department"
                                        :items="['1', '2', '3', '4']"
                                        label="แผนก"
                                        required
                                    ></v-select>
                                </v-col>
                                <v-col cols="12" sm="6">
                                    <v-select
                                        id="id_position"
                                        name="id_position"
                                        v-model="newemp.id_position"
                                        :items="['1', '2']"
                                        label="แผนก"
                                        required
                                    ></v-select>
                                </v-col>
                                <v-col cols="12" sm="6">
                                    <v-dialog
                                        ref="dialog"
                                        v-model="date_emp"
                                        :return-value.sync="newemp.date_emp"
                                        persistent
                                        width="290px"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            วันเกิด
                                            <v-text-field
                                                v-model="newemp.date_emp"
                                                label="เลือกวัดเกิด"
                                                prepend-icon="mdi-calendar"
                                                readonly
                                                v-bind="attrs"
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="date"
                                            scrollable
                                        >
                                            <v-spacer></v-spacer>
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="modal = false"
                                            >
                                                Cancel
                                            </v-btn>
                                            <v-btn
                                                text
                                                color="primary"
                                                @click="$refs.dialog.save(date)"
                                            >
                                                OK
                                            </v-btn>
                                        </v-date-picker>
                                    </v-dialog>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*indicates required field</small>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-row>

        <!-- End Dialog -->
        <!-- Profile Dialog  -->

        <v-row justify="center">
            <v-dialog v-model="dialog_profile" width="600px">
                <v-card>
                    <v-card-title>
                        <span class="headline text-center">Profile</span>
                    </v-card-title>
                    <v-card-text>
                        <v-avatar
                            class="text-center"
                            color="primary"
                            size="100"
                        >
                            <img
                                src="https://scontent.fbkk19-1.fna.fbcdn.net/v/t1.0-9/128930200_2771274259811681_5196317210631844961_o.jpg?_nc_cat=101&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeH1bS3ZTEIh0DPg1Fvn9ajUVhLcAEO2V-5WEtwAQ7ZX7idMINtiL17wZQXbmQYGORf1qKok5onctXhYh1xzD1yQ&_nc_ohc=yjFcOkUhVsMAX-feCEI&_nc_ht=scontent.fbkk19-1.fna&oh=aa8849ff74d879a991dbac38d2b48d2a&oe=601313FB"
                                alt=""
                            />
                        </v-avatar>

                        <div
                            v-for="showdetail_emp in showdetail_emps"
                            :key="showdetail_emp.id_emp"
                        >
                            {{ showdetail_emp.id_emp }}
                            {{ showdetail_emp.name }}
                            {{ showdetail_emp.birthday }}
                        </div>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            color="green darken-1"
                            text
                            @click="dialog_profile = false"
                        >
                            ปิด
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <v-dialog v-model="delete_cf" max-width="290">
            <v-card>
                <v-card-title class="headline">
                    {{ id_emp }}
                </v-card-title>

                <v-card-text>
                    คุณแน่ใจหรือว่าคุณจบลบพนักงานคนนี้
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        color="success darken-1"
                        text
                        @click="delete_cf = false"
                    >
                        ยกเลิก
                    </v-btn>

                    <v-btn
                        @click.prevent="delete_cf_emp()"
                        color="error darken-1"
                        text
                    >
                        ยื่นยัน
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <!-- End Profile Dialog  -->
    </v-main>
</template>
<script>
export default {
    data() {
        return {
            // rules:false;
            // clear_date:false,
            clear_date_btn: "",
            start_time_s: "",
            start_time: false,
            // date_end: false,
            date_emp: false,
            delete_cf: false,
            start_time_s: new Date().toISOString().substr(0, 10),
            date: new Date().toISOString().substr(0, 10),
            showdetail_emps: [],
            GetEmployees: [],
            dialog_add_emp: false,
            dialog_profile: false,
            notifications: false,
            sound: true,
            widgets: false,
            Search_emp:'',
            newemp: {
                id_emp: "",
                name: "",
                lastname: "",
                id_department: "",
                id_position: "",
                date_emp: ""
            },
            id_emp: "",
            start_time_s: ""
            // id_emp:''
        };
    },

    created() {
        this.interval = setInterval(() => {
            //   this.interval = setInterval();
            let start_time = this.start_time_s;
            var Search_emp = this.Search_emp;
             if (Search_emp != "") {
                        console.log(Search_emp);

                axios
                    .get("/api/GetEmployee", {
                        params: {
                            Search_emp: Search_emp
                        }
                    })
                    .then(({ data }) => (this.GetEmployees = data));
            }
           else if (start_time != "" ) {
                console.log(start_time);

                axios
                    .get("/api/GetEmployee", {
                        params: {
                            start_time: start_time
                        }
                    })
                    .then(({ data }) => (this.GetEmployees = data));
            
            } 
              else {
                this.clear_date_btn = false
                    axios
                        .get("/api/GetEmployee")
                        .then(({ data }) => (this.GetEmployees = data));
            }
      
        }, 1000);
    },

    //     this.interval = setInterval();
    //     let start_time = this.start_time_s
    //     console.log(start_time)
    //     if(start_time=='')
    //     {
    //         axios
    //             .get("/api/GetEmployee")
    //             .then(({ data }) => (this.GetEmployees = data));

    //     }
    //     else {
    //         axios
    //             .get("/api/GetEmployee",start_time)
    //             .then(({ data }) => (this.GetEmployees = data));

    //     }
    // },
    methods: {
        create_emp() {
            var in_emp = this.newemp;
            console.log(in_emp);
            axios.post("/api/CreateEmployee", in_emp).then;
            this.dialog_add_emp = false;
        },
        // startInterval() {
        //     setInterval(() => {
        //         axios
        //             .get("/api/GetEmployee")
        //             .then(({ data }) => (this.GetEmployees = data));
        //     }, 2000);
        // },
        showdetail_emp(id) {
            this.dialog_profile = true;
            let id_emp = id;
            axios
                .get("api/showdetail_emp/" + id_emp)
                .then(({ data }) => (this.showdetail_emps = data));
        },
        delete_cf_emp() {
            console.log(this.id_emp);
            var id_emp = this.id_emp;
            axios.delete("api/DeleteEmployee/" + id_emp).then(response => {
                let i = this.GetEmployees.map(
                    GetEmployee => GetEmployee.id_emp
                ).indexOf(id_emp);
                this.GetEmployees.splice(i, 1);
                this.delete_cf = false;
            });
        },
        search_date() {
            // console.log(id_emp)
            axios
                .get("/api/GetEmployee")
                .then(({ data }) => (this.GetEmployees = data));
        },
        clear_date() {
            // e.preventDefault()
            this.start_time_s = "";
        },

        deleteemp(id) {
            console.log(id);
            this.id_emp = id;
            console.log(this.id_emp);
        }
    }
};
</script>
