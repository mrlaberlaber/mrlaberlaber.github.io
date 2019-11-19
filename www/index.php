<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <!-- AR head -->
        <!-- include AR.js & dependencies -->
        <script src="/content/extern/aframe0.9.2.min.js"></script>
        <script src="/content/extern/aframe-ar2.0.5.js"></script>
        <script type="text/javascript">
            // Component to change to a sequential color on click.
            AFRAME.registerComponent('cursor-listener', {
              init: function () {
                // vars init
                var sinupret_taken = 0;
                var sinupret_target = 2;
                var color_current = 'orange';
                var el_sinupret_display = document.querySelector('#sinupret_display');
                
                // helper
                function update_color(color_new) {
                  color_current = color_new;
                  this.setAttribute('material', 'color', color_current);		
                }
                
                // events
                this.el.addEventListener('click', function (evt) {	
                  // target not reached yet
                  if (sinupret_taken <= sinupret_target - 1) {
                    sinupret_taken = sinupret_taken + 1;
                    
                    // update text - Why this only works if this block is executed before color change?!
                    el_sinupret_display.setAttribute('value', `Sinupret\n${sinupret_taken}/${sinupret_target}`);
                    
                    // update color
                    if (sinupret_taken == sinupret_target) {
                      update_color('green');
                    }
                    else {
                      update_color('yellow');
                    }
                  }
                  // target already reached
                  else {
                    alert("Drug target already reached!\n\nNo additional pills required.");
                  }
                });
              
                // events: hover darkening
                this.el.addEventListener('mouseenter', function (evt) {
                  this.setAttribute('material', 'color', 'black');
                });	
                this.el.addEventListener('mouseleave', function (evt) {
                  this.setAttribute('material', 'color', color_current); // reset color
                });
              }
            });
        </script>
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
                            <v-list-item-title><router-link to="/">Home</router-link></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>mdi-cube-scan</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title><router-link to="/scan">Scan</router-link></v-list-item-title>
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
            <v-content><v-container style="max-width: 960px;" justify-center>
                <!-- using vue-router -->
                <router-view></router-view>
            </v-container></v-content>

            <v-footer color="purple" app >
                <span class="white--text">&copy; 2019 Theo</span>
            </v-footer>
        </v-app>
        
        <!-- must be at end -->
        <!--<script type="text/plain" src='https://raw.githubusercontent.com/jakesgordon/javascript-state-machine/3.1.0/dist/state-machine.min.js' crossorigin="anonymous"></script>-->
    
        <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>  
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
        <script src="index.js"></script>
    </body>
</html>