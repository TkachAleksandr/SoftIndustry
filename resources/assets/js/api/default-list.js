export default {

    async getDefaultList() {
        const json = await window.axios.get('/api/default/list');

        return json;
    },
};
