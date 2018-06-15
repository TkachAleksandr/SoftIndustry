import defaultList from '../../../api/default-list';
import * as types from './mutation-types';

export const getDefaultList = async ({ commit }) => {
    const json = await defaultList.getDefaultList();

    if (json.status === 200) {
        commit(types.DEFAULT_LIST, json.data);
        return json;
    }

    throw json;
};

export default {
    getDefaultList,
};
