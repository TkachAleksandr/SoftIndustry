export default {

    async saveNewEmployee(params) {
        const json = await window.axios.post('/api/employee', params);

        return json;
    },

    async getlistEmployees() {
        const json = await window.axios.get('/api/employee');

        return json;
    },


};
