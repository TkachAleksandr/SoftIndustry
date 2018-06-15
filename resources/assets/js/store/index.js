import Vue from 'vue';
import Vuex from 'vuex';

import home from './modules/employee';
import defaultList from './modules/defaultList';

Vue.use(Vuex);

export default new Vuex.Store({
    /**
     * Assign the modules to the store.
     */
    modules: {
        home,
        defaultList,
    },
});