<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">{{ $t('translation.listEmployees') }}</div>
                    <div>
                        <vuetable ref="employeeList"
                                  api-url="/api/employee"
                                  :fields="fields"
                                  pagination-path=""
                                  data-path="data"
                        >
                            <template slot="characteristics" slot-scope="props">
                                <ul v-for="item in props.rowData.characteristics">
                                    <li>{{ item.label }} : {{ item.mark }}</li>
                                </ul>
                                <!--<button type="button" class="btn btn-md" :title="$t('translation.remove')"-->
                                        <!--@click="removeUser(props.rowData.id)">-->
                                    <!--<i class="fa fa-trash-o"></i>-->
                                <!--</button>-->
                            </template>
                        </vuetable>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable.vue';

    export default {
        components: {
            Vuetable,
        },
        data() {
            return {
                fields: [
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
                        titleClass: 'text-left',
                        dataClass: 'text-left',
                    },
                ],
            };
        },
    };
</script>