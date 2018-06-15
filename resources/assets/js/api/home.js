export default {

    async saveNewEmployee(params) {
        console.log(params.data);
        const json = await window.axios.post('/api/employee', params);

        return json;
    },
};
