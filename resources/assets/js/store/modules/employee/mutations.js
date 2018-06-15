import * as types from './mutation-types';

export default {
    [types.USER_ID](state, payload) {
        state.userId = payload;
    },
};
