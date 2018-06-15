import home from '../../../api/home';
import * as types from './mutation-types';

export const saveNewEmployee = async ({ commit }, payload) => {
    console.log(payload);
    const json = await home.saveNewEmployee(payload);

    if (json.status === 200) {
        commit(types.USER_ID, json.data);
        return json;
    }

    throw json;
};

export default {
    saveNewEmployee,
};
