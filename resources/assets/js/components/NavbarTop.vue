<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
        <a class="navbar-brand" href="#">{{ $t('translation.logoName') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <router-link tag="li" :to="{ name: 'home' }" class="nav-link">
                    {{ $t('translation.createEmployee') }}
                </router-link>
                <router-link tag="li" :to="{ name: 'list.employees' }" class="nav-link">
                    {{ $t('translation.listEmployees') }}
                </router-link>
            </ul>
        </div>
    </nav>
</template>
