import home from '../../../api/home';
import * as types from './mutation-types';

export const saveNewEmployee = async ({ commit }, payload) => {
    const json = await home.saveNewEmployee(payload);

    if (json.status === 200) {
        commit(types.USER_ID, json.data);
        return json;
    }

    throw json;
};

export const getlistEmployees = async ({ commit }) => {
    const json = await home.getlistEmployees();

    if (json.status === 200) {
        commit(types.TOTAL, json.data);
        return json;
    }

    throw json;
};

export default {
    saveNewEmployee,
    getlistEmployees,
};
