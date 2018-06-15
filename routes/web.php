<?php

Route::get('/{capture?}', 'SpaController@index')->where('capture', '[\/\w\.-]*');
