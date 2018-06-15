import * as types from './mutation-types';

export default {
    [types.DEFAULT_LIST](state, payload) {
        state.defaultList = payload;
    },
};
