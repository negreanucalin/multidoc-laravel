<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Multidoc</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset(mix('app.css', 'vendor/multidoc')) }}" rel="stylesheet" type="text/css">
<body>
<div id="app">
    <v-app>
        <div class="columns">
            <div class="column">
                <router-view name="header"></router-view>
            </div>
        </div>
        <div class="columns">
            <main class="column">
                <section>
                    <router-view name="content"></router-view>
                </section>
            </main>
        </div>
    </v-app>
</div>
<script src="{{ asset(mix('app.js', 'vendor/multidoc')) }}"></script>
</body>
</html>