import home from '../../../api/home';

export const saveNewEmployee = async (context, payload) => {
    const json = await home.saveNewEmployee(payload);

    if (json.status === 200) {
        return json;
    }

    throw json;
};

export default {
    saveNewEmployee,
};
