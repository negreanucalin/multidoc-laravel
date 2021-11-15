<?php
Route::get(config('multidoc.url','/multidoc'), function () {
    return view('multidoc::index');
});
