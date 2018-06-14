<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{ $t('translation.createNewEmployeeTitle') }}</div>

                    <div class="card-body">
                        <div class="mb-5">
                            <div class="form-group">
                                <label for="surname"> {{ $t('translation.surname') }} </label>
                                <input type="text" class="form-control" id="surname"
                                       v-model="surname">
                            </div>
                            <div class="form-group">
                                <label for="name"> {{ $t('translation.name') }} </label>
                                <input type="text" class="form-control" id="name"
                                       v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="middle_name"> {{ $t('translation.middleName') }} </label>
                                <input type="text" class="form-control" id="middle_name"
                                       v-model="middleName">
                            </div>

                            <div class="form-group">
                                <label for="photo"> {{ $t('translation.addPhoto') }} </label>
                                <input type="file" name="photo" id="photo" class="form-control"
                                       accept="image/*"
                                       @change="photoChange($event.target.files)">
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="form-group row">
                                <label for="sociability" class="col-sm-4 col-form-label">{{ $t('translation.sociability') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="sociability"
                                           v-model="sociability">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="engineeringSkills" class="col-sm-4 col-form-label">{{ $t('translation.engineeringSkills') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="engineeringSkills"
                                           v-model="engineeringSkills">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="timeManagement" class="col-sm-4 col-form-label">{{ $t('translation.timeManagement') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="timeManagement"
                                           v-model="timeManagement">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="knowledgeLanguages" class="col-sm-4 col-form-label">{{ $t('translation.knowledgeLanguages') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="knowledgeLanguages"
                                           v-model="knowledgeLanguages">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectProject">{{ $t('translation.selectProject') }}</label>
                            <multiselect id="selectProject"
                                    v-model="selected"
                                    :options="options">
                            </multiselect>
                        </div>

                        <button type="button" class="btn btn-md btn-success float-right">{{ $t('translation.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';

    export default {
        components: {
            Multiselect,
        },
        data() {
            return {
                surname: '',
                name: '',
                middleName: '',
                sociability: '5',
                engineeringSkills: '5',
                timeManagement: '5',
                knowledgeLanguages: '5',
                selected: null,
                options: ['1', '2', '3'],
            };
        },
        mounted() {
            console.log('Component mounted Home.')
        },
        methods: {
            photoChange(file) {
                this.file = file[0];
            },
        },
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
