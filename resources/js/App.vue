<template>
    <v-app>
        <v-card height="100%" width="100%">
            <!-- <v-system-bar
    blue lighten-2

        lights-out
        height="40"
      >
        <v-spacer></v-spacer>
      <v-chip
      class="ma-2"
      color="primary"
      outlined
      pill
    >
        <v-icon>mdi-wifi-strength-4</v-icon>
        <v-icon>mdi-signal-cellular-outline</v-icon>
        <v-icon>mdi-battery >{{}}</v-icon>
        <span>
          
  
    {{ new Date().toISOString().substr(0, 10)}}
       <v-switch
        v-model="$vuetify.theme.dark"
        hint="Dark mode"
        inset
        label="Dark mode"
        persistent-hint
      ></v-switch>
   </span>
       </v-chip>

      </v-system-bar> -->

            <v-app-bar
                color="#0D47A1
"
                dense
                flat
            >
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>

                <v-toolbar-title>
                    <v-chip class="ma-2" color="#0D47A1">
                        <!-- <v-icon color="red" small>settings</v-icon> -->

                        Managment
                        <!-- {{link}} -->
                    </v-chip>
                </v-toolbar-title>

                <v-spacer></v-spacer>
                <router-link to="/Login">
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>login</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Login</v-list-item-title>
                    </v-list-item>
                </router-link>
                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-filter</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                absolute
                temporary
                height="100%"
                color="dark"
            >
                <v-list>
                    <v-list-item class="px-2">
                        <v-list-item-avatar>
                            <v-img
                                src="https://randomuser.me/api/portraits/women/85.jpg"
                            ></v-img>
                        </v-list-item-avatar>
                    </v-list-item>

                    <v-list-item link>
                    
                         <!-- @{{member.logged_in_user.name}} -->
                        <v-list-item-content>
                            <v-list-item-title class="title">
                                Sandra Adams
                            </v-list-item-title>
                            <v-list-item-subtitle
                                >sandra_a88@gmail.com</v-list-item-subtitle
                            >
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list nav dense>
                    <router-link to="/Employee">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon fab color="#C6F2FF"
                                    >account_circle</v-icon
                                >
                            </v-list-item-icon>
                            <v-list-item-title
                                >Employee Managment</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>
                    <router-link to="/Dashboard">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>analytics</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>Dashboard</v-list-item-title>
                        </v-list-item>
                    </router-link>
                    <router-link to="/Device">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-monitor-multiple</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title
                                >Device Manament</v-list-item-title
                            >
                        </v-list-item>
                    </router-link>
                    <router-link to="/home">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>mdi-view-list</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>TicketList</v-list-item-title>
                        </v-list-item>
                    </router-link>
                    <router-link to="/Users">
                        <v-list-item link>
                            <v-list-item-icon>
                                <v-icon>assignment_ind</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title>Users</v-list-item-title>
                        </v-list-item>
                    </router-link>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>map</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>Map</v-list-item-title>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-icon>
                            <v-icon>mdi-star</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title>API</v-list-item-title>
                    </v-list-item>
                </v-list>
                <v-switch
                    label="Light Mode"
                    v-model="$vuetify.theme.dark"
                ></v-switch>
            </v-navigation-drawer>

            <v-card-text>
                <v-main color="primary" lights-out>
                    <router-view></router-view>
                </v-main>
            </v-card-text>
        </v-card>
        <v-footer padless>
            <v-col class="text-center" cols="12">
                {{ new Date().getFullYear() }} —
                <strong>Dev By Nattapon</strong>
            </v-col>
        </v-footer>
    </v-app>
</template>
<script>
export default {
    theme: {
        dark: true
    },
    data() {
        return {
            // loginmember:'',
            link: "",
            level: []
        };
    },

    data: () => ({
        drawer: false,
        group: null
    }),
    created() {
        // console.log(this.loginmember)
        this.interval = setInterval(() => {
            this.link = this.$router.history.current.path;
        }, 1000);
    },
    watch: {
        group() {
            this.drawer = false;
        },
        battery() {
            var battery = navigator.getBattery().then(function(battery) {
                this.level = battery.level;
                // var rest = battery.dischargingTime;
                // GetEmployees = data;
                console.log(level);
            });
        }
    }
};
</script>
