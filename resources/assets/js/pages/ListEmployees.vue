<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        {{ $t('translation.listEmployees') }}
                        <span class="float-right">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                   v-model.trim="searchInput">
                        </span>
                    </div>
                    <div class="card-body">
                        <vuetable ref="employeeList"
                                  api-url="/api/employee"
                                  :fields="fields"
                                  pagination-path=""
                                  data-path="data"
                                  :append-params = "{ searchInput }"
                        >
                            <template slot="photo" slot-scope="props">
                                <img :src="props.rowData.photo_path  === null ? '/1.jpg' : props.rowData.photo_path" class="img-thumbnail" style="height: 100px">
                            </template>
                            <template slot="characteristics" slot-scope="props">
                                <ul>
                                    <li v-for="item in props.rowData.characteristics">{{ $t(`translation.${item.value}`) }} : {{ item.mark }}</li>
                                </ul>
                            </template>
                        </vuetable>

                        <template v-if="total && isShowTotal">
                            {{ $t('translation.totalCharacteristics') }}
                            <ul>
                                <li v-for="item in total.total_characteristics">{{ $t(`translation.${item.value}`) }} : {{ Math.round(item.sum) }}</li>
                            </ul>
                        </template>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue';
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo';

    export default {
        components: {
            Vuetable,
            VuetablePaginationInfo,
        },
        data() {
            return {
                searchInput: '',
                isShowTotal: true,
                fields: [
                    {
                        name: '__slot:photo',
                        titleClass: 'text-left',
                        dataClass: 'text-left',
                    },
                    {
                        name: 'full_name',
                        title: this.$t('translation.fullName'),
                        sortField: 'full_name',
                        titleClass: 'text-left',
                        dataClass: 'text-left',
                    },
                    {
                        name: '__slot:characteristics',
                        title: this.$t('translation.characteristics'),
                        titleClass: 'text-left',
                        dataClass: 'text-left',
                    },
                    {
                        name: 'amount_projects',
                        title: this.$t('translation.amountProjects'),
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                    },
                ],
            };
        },
        mounted() {
            this.$store.dispatch('getlistEmployees');
        },
        computed: {
            total() {
                return this.$store.getters.total;
            },
        },
        watch: {
            searchInput(val) {
                this.isShowTotal = val === '';
                this.$nextTick(() => {
                    this.$refs.employeeList.refresh();
                })
            },
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.paginationInfo.setPaginationData(paginationData);
            },
        }
    };
</script>