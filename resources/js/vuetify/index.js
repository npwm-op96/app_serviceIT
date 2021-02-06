import Vue from 'vue'

import Vuetify from 'vuetify'
import "vuetify/dist/vuetify.css";
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader





Vue.use(Vuetify)


const opts = {}

export default new Vuetify({
    theme: {
        dark: true
    },
    icons: {
        iconfont: 'md',

    },
})