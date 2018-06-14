import Vue from 'vue';
import VueI18n from 'vue-i18n';

import ru from '../lang/ru/ru';
import en from '../lang/en/en';

Vue.use(VueI18n);

export default new VueI18n({
    locale: 'ru',
    messages: {
        ru,
        en,
    },
});
