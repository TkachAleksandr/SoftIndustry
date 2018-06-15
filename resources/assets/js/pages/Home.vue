<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{ $t('translation.createNewEmployeeTitle') }}</div>

                    <div class="card-body">
                        <div class="mb-5">
                            <div class="form-group">
                                <label for="surname"><span class="text-danger">{{ $t('translation.star') }}</span> {{ $t('translation.surname') }} </label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                       :data-vv-as="$t('translation.surname')"
                                       v-validate="'required'"
                                       v-model="surname">
                                <small class="form-text text-danger" v-show="errors.has('surname')">
                                    {{ errors.first('surname') }}
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="name"><span class="text-danger">{{ $t('translation.star') }}</span> {{ $t('translation.name') }} </label>
                                <input type="text" class="form-control" id="name" name="name"
                                       :data-vv-as="$t('translation.name')"
                                       v-validate="'required'"
                                       v-model="name">
                                <small class="form-text text-danger" v-show="errors.has('name')">
                                    {{ errors.first('name') }}
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="middleName"><span class="text-danger">{{ $t('translation.star') }}</span> {{ $t('translation.middleName') }} </label>
                                <input type="text" class="form-control" id="middleName" name="middleName"
                                       :data-vv-as="$t('translation.middleName')"
                                       v-validate="'required'"
                                       v-model="middleName">
                                <small class="form-text text-danger" v-show="errors.has('middleName')">
                                    {{ errors.first('middleName') }}
                                </small>
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
                                    <input type="number" min="1" max="10" class="form-control" id="sociability" name="sociability"
                                           :data-vv-as="$t('translation.sociability')"
                                           v-validate="'min:1|max:10'"
                                           v-model="sociability">
                                </div>
                                <small class="form-text text-danger" v-show="errors.has('sociability')">
                                    {{ errors.first('sociability') }}
                                </small>
                            </div>
                            <div class="form-group row">
                                <label for="engineeringSkills" class="col-sm-4 col-form-label">{{ $t('translation.engineeringSkills') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="engineeringSkills" name="engineeringSkills"
                                           :data-vv-as="$t('translation.engineeringSkills')"
                                           v-validate="'min:1|max:10'"
                                           v-model="engineeringSkills">
                                </div>
                                <small class="form-text text-danger" v-show="errors.has('engineeringSkills')">
                                    {{ errors.first('engineeringSkills') }}
                                </small>
                            </div>
                            <div class="form-group row">
                                <label for="timeManagement" class="col-sm-4 col-form-label">{{ $t('translation.timeManagement') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="timeManagement" name="timeManagement"
                                           :data-vv-as="$t('translation.timeManagement')"
                                           v-validate="'min:1|max:10'"
                                           v-model="timeManagement">
                                </div>
                                <small class="form-text text-danger" v-show="errors.has('timeManagement')">
                                    {{ errors.first('timeManagement') }}
                                </small>
                            </div>
                            <div class="form-group row">
                                <label for="knowledgeLanguages" class="col-sm-4 col-form-label">{{ $t('translation.knowledgeLanguages') }}</label>
                                <div class="col-sm-2">
                                    <input type="number" min="1" max="10" class="form-control" id="knowledgeLanguages" name="knowledgeLanguages"
                                           :data-vv-as="$t('translation.knowledgeLanguages')"
                                           v-validate="'min:1|max:10'"
                                           v-model="knowledgeLanguages">
                                </div>
                                <small class="form-text text-danger" v-show="errors.has('knowledgeLanguages')">
                                    {{ errors.first('knowledgeLanguages') }}
                                </small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectProjects">{{ $t('translation.selectProject') }}</label>
                            <multiselect id="selectProjects"
                                    :multiple="isMultiple"
                                    :options="listProjects"
                                    :custom-label="customLabel"
                                    v-model="selectProjects">
                            </multiselect>
                        </div>

                        <button type="button" class="btn btn-md btn-success float-right"
                            @click="saveNewEmployee">
                            {{ $t('translation.save') }}
                        </button>
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
                surname: 'e',
                name: 'e',
                middleName: 'e',
                sociability: 5,
                engineeringSkills: 5,
                timeManagement: 5,
                knowledgeLanguages: 5,
                selectProjects: null,
                isMultiple: false,
            };
        },
        mounted() {
            this.$store.dispatch('getDefaultList');
        },
        computed: {
            listProjects() {
                let arr = [];

                if (this.$store.getters.defaultList !== null) {
                    arr = this.$store.getters.defaultList.projects.map(function (el) {
                        return ({
                            label: el.label,
                            id: el.id
                        });
                    })
                }
                return arr;
            },
        },
        watch: {
            timeManagement(value) {
                this.isMultiple = value >= 10;
            },
        },
        methods: {
            customLabel(option) {
                return option.label
            },
            photoChange(file) {
                this.file = file[0];
            },
            async saveNewEmployee() {
                const valid = await this.$validator.validateAll();
                console.log(valid,!Array.isArray(this.selectProjects));
                if (valid) {
                    if (!Array.isArray(this.selectProjects)) {
                        this.selectProjects = [this.selectProjects];
                    }
                    try {
                        await this.$store.dispatch('saveNewEmployee', {
                            surname: this.surname,
                            name: this.name,
                            middle_name: this.middleName,
                            sociability: this.sociability,
                            engineering_skills: this.engineeringSkills,
                            time_management: this.timeManagement,
                            knowledge_languages: this.knowledgeLanguages,
                            projects: this.selectProjects,
                        });
                        this.$toasted.success(this.$t('translation.success'));
                        this.clearFields();
                    } catch (e) {
                        this.$toasted.error(this.$t('translation.error'));
                    }
                } else {
                    this.$toasted.error(this.$t('translation.notValidForm'));
                }
            },
            clearFields() {
                this.surname = '';
                this.name = '';
                this.middleName = '';
                this.sociability = 5;
                this.engineeringSkills = 5;
                this.timeManagement = 5;
                this.knowledgeLanguages = 5;
                this.selectProjects = null;
                this.$validator.reset();
            },
        },
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
