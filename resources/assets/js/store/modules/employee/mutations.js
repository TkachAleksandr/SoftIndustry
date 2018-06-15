import * as types from './mutation-types';

export default {
    [types.TOTAL](state, payload) {
        state.total = payload;
    },
};
