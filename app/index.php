<!DOCTYPE html>
<html>
    <head>
        <title>Drugser</title>

        <!--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">-->
        <!--<link href="/content/extern/roboto.css" rel="stylesheet" type="text/css">-->
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <!--<link href="/content/extern/mdi/css/materialdesigniconsAT4.x.min.css" rel="stylesheet" type="text/css">-->
        <!--<link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">-->
        <link href="/content/extern/vuetifyAT2.x.min.css" rel="stylesheet" type="text/css">
        
        <link href="/content/style.css" rel="stylesheet" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    </head>
    <body>
        <v-app id="app">
            <!-- Applying the app prop automatically applies position: fixed to the layout element. If your application calls for an absolute element, you can overwrite this functionality by using the absolute prop. -->

            <v-navigation-drawer v-model="drawer" app>
                <v-list dense>
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/home">Home</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>mdi-settings</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/settings">Settings</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>mdi-play</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/introduction">Introduction</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>

            <v-app-bar app color="indigo" dark>
                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Drugser</v-toolbar-title>
            </v-app-bar>

            <!-- Sizes your content based upon application components -->
            <v-content><v-container style="max-width: 962px;" justify-center>
                <!-- using vue-router -->
                <router-view></router-view>
            </v-container></v-content>
        </v-app>
        
        <!-- must be at end -->
        <!--<script src='https://raw.githubusercontent.com/jakesgordon/javascript-state-machine/3.1.0/dist/state-machine.min.js' crossorigin="anonymous"></script>-->
    
        <!--<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>-->
		<script src="/content/extern/vueAT2.x.js"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>  -->
		<script src="/content/extern/vuetifyAT2.x.js"></script>
        <!--<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>-->
		<script src="/content/extern/vue-router3.1.3.js"></script>

        <script src="/content/index.js"></script>
    </body>
</html>