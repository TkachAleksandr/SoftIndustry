import Vue from 'vue';
import VeeValidate from 'vee-validate';

import validationEn from '../lang/en/validator';
import validationRu from '../lang/ru/validator';

Vue.use(VeeValidate, {
    fieldsBagName: 'fieldsValidation',
    locale: 'ru',
    dictionary: {
        en: validationEn,
        ru: validationRu,
    },
});
