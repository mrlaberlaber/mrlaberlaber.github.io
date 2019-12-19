function handleEvent(e) {
    console.log(e.detail) // outputs: {foo: 'bar'}
    vm.routerPush("/medicine/withdrawal/info");

    // target not reached yet
    if (vm.medicine.drugs.drugserErgo.amount.actual <= vm.medicine.drugs.drugserErgo.amount.target - 1) {
        vm.medicine.drugs.drugserErgo.amount.actual += 1;
        
        // update text - NOT ANYMORE --> CAN CHANGE Why this only works if this block is executed before color change?!
        //el_drugserErgo_display.setAttribute('value', `Drugser Ergonomics\n${drugserErgo_taken}/${drugserErgo_target}`);

        vm.medicine.drugs.drugserErgo.text = `${vm.medicine.drugs.drugserErgo.name_short}\n${vm.medicine.drugs.drugserErgo.amount.actual}/${vm.medicine.drugs.drugserErgo.amount.target}`
        
        // update color
        if (vm.medicine.drugs.drugserErgo.amount.actual == vm.medicine.drugs.drugserErgo.amount.target) {
            vm.medicine.drugs.drugserErgo.color = vm.medicine.color.done;
        }
        else {
            vm.medicine.drugs.drugserErgo.color = vm.medicine.color.unfinished;
        }

        // push data to iframe
        vm.medicine.drugs;
    }
    // target already reached
    else {
        alert("Drug target already reached!\n\nNo additional pills required.");
    }

    // update uis
    drugs_all_target = 0
    drugs_all_actual = 0
    for (drug in vm.drugs) {
        drugs_all_actual += drug.amount.actual;
        drugs_all_target += drug.amount.target;
    }
    vm.medicine.ui.scan.medicine_missing_text = `Missing  Medicine ${drugs_all_actual}/${drugs_all_target}`

    
    // push updates back
    var data = { foo: 'bar' }
    var event = new CustomEvent('fromParent', { detail: data })
    document.querySelector('#iframeScan').contentDocument.dispatchEvent(event)
};

window.document.addEventListener('myCustomEvent', handleEvent, false)

Vue.config.ignoredElements = [
    'a-scene',
    'a-entity',
    'a-camera',
    'a-box',
    'a-sky',
    'a-assets',
    'a-marker',
    'a-marker-camera',
    'a-text',
    'a-cursor',
]

// Router
const User = {
    template: `
        <div>User {{ $route.params.id }}</div>
    `
};

const medicineScan = {
    template: `<div>
    <iframe 
        id="iframeScan"
        style="height:100%; width:100%; position:fixed; left: 0; right: 0; bottom: 0; top: 54px;"
        frameborder="0"
        src="/content/scan.php">
    </iframe>

    <v-btn
        fixed
        style="top: 70px;"
        left
        color="red"
        x-large
        class="text--white font-weight-bold headline"
        >
        <!--medicine.ui.scan.medicine_missing_text-->
        Missing Medicine 0/3
    </v-btn>
    <v-btn
        fixed
        fab
        right
        bottom
        color="black"
        >
        <v-icon x-large color="white">mdi-pause</v-icon>
    </v-btn>
    <v-btn
        fixed
        left
        bottom
		href="/pub/#sc=2&c=1"
        color="grey"
        >
        <v-icon large color="white">Mockup</v-icon>
    </v-btn>
    <v-btn
        fixed
        fab
        bottom
        style="right: 88px;"
        color="orange"
        >
        <v-icon x-large color="white">mdi-flash</v-icon>
    </v-btn>
</div>`
}

const settings = {
    template: `<div>Settings</div>
    `
};

const introduction = {
    template: `
    <div>
    <h1>Drug Intake Assisting App for Elderly People - Protoype</h1>
    <hr>
    <h2>How-To</h2>
    <ol>
        <li>open <a href="/content/marker/all_pattern.png">some drugs</a> on your desktop</li>
        <li>
            open <a @click="$router.push('/home')">the prototype (Scan Drugs)</b></a> on your mobile<br>
            (CAVE is <b>loading slowly in China</b>)<br>
            (CAVE must be a somewhat modern browser)<br>
            (CAVE doesn't work inside WeChat under iOS)<br>
        </li>
        <li>See also the <a href="pub/#sc=2&c=1&id=897ybu&p=scan_drugs">mockup</a></li>
        <li>enjoy!</li>
    </ol>
    <hr>
    <h2>All other drugs</h2>
    <ul>
        <li><a href="/content/marker/drugser_ergo_pattern.png">Drugser Ergonomics</a></li>
        <li><a href="/content/marker/drugser_adult_strength_pattern.png">Drugser Adult Strength</a></li>
        <li><a href="/content/marker/all_pattern.png">all</a></li>
    </ul>
    </div>
    `
};

const medicineWithdrawalInfo = {
    template: `
<v-container fluid>
    <v-col cols=12>
        <v-card>
            <v-list-item three-line>
                <v-list-item-content>
                    <v-list-item-title class="headline mb-1">Drugser Ergonomics</v-list-item-title>
                    Note: Very important medicine!<br>Not compatible with: No-Drugser Ergonomics
                </v-list-item-content>
        
                <v-list-item-avatar
                    tile
                    size="125"
                    >
                    <v-img src="/content/marker/drugser_ergo_org.png"></v-img>
                </v-list-item-avatar>
            </v-list-item>
        </v-card>
    </v-col>

    <v-col cols=12>
        <v-card>
            <v-list-item three-line>
                <v-list-item-content>
                    <v-list-item-title class="headline mb-1">Prescription Plan</v-list-item-title>
                    Amount: 1<br>Frequency: Wednesdays, Sundays<br>Cure: cold
                </v-list-item-content>
            </v-list-item>
        </v-card>
    </v-col>

    <v-row dense>
        <v-col
        cols=12>
            <v-btn to="/medicine/withdrawal/confirm" color="green" class="white--text font-weight-bold" x-large block>
                <v-icon x-large color="white"">mdi-check-bold</v-icon>
                Confirm Withdrawal
            </v-btn>
        </v-col>
    </v-row>
</v-container>
    `,
}

const medicineWithdrawlConfirm = {
    template: `
<div>
    <v-container fluid>
        <v-row dense>
            <v-col cols=12>
                <v-card>
                    <v-list-item three-line>
                        <v-list-item-content>
                            <v-list-item-title class="headline mb-1">Drugser Ergonomics</v-list-item-title>
                            Amount: 1<br>Note: Very important medicine!
                        </v-list-item-content>
                
                        <v-list-item-avatar
                            tile
                            size="125"
                            >
                            <v-img src="/content/marker/drugserErgo_org.png"></v-img>
                        </v-list-item-avatar>
                    </v-list-item>
                </v-card>
            </v-col>

            <v-col cols=12>
                <p color="black" class="font-weight-bold text-center display-2">
                    Did you withdraw?
                </p>
            </v-col>

            <v-col cols=6>
                <v-btn to="/medicine/scan" color="green" class="white--text font-weight-bold" x-large>
                    <v-icon x-large color="white"">mdi-check-bold</v-icon>
                    Yes
                </v-btn>
            </v-col>
            <v-col cols=6>
                <v-btn to="/medicine/withdrawal/info" color="red" class="white--text font-weight-bold" x-large>
                    <v-icon x-large color="white"">mdi-close</v-icon>
                    No
                </v-btn>
            </v-col>
        </v-row>
    </v-container>
</div>
    `,
}

const default_ = {
    template: `
    <v-container fluid>
        <v-row dense>
            <v-col
                v-for="card in cards"
                :key="card.title"
                :cols="card.flex"
            >                      
                <v-card :to="card.click" :color="card.color" class="white--text font-weight-bold headline" height=90>
                    <v-icon x-large color="white">{{card.icon}}</v-icon>
                    {{card.title}}
                </v-card>               
            </v-col>
        </v-row>
    </v-container>
        `,
    //@click="card.click"
    data: () => ({
        cards: [
            // 12 is full width
            { title: 'Scan Box', click: '/medicine/scan', icon: 'mdi-cube-scan', color:'purple', flex: 6 },
            { title: 'Call Doctor', click: '/assistance/call_doc', icon: 'mdi-doctor', color:'orange', flex: 6 },
            { title: 'Add Plan', click: '/plan/add', icon: 'mdi-plus', color:'green', flex: 6 },
            { title: 'History', click: '/history', icon: 'mdi-history', color:'black', flex: 6 }, 
            { title: 'Debug', click: '/medicine/withdrawal/info', icon: 'mdi-history', color:'black', flex: 6 }, 
        ],
        drawer: null,
    })
    ,
    // define methods under the `methods` object
    methods: {
    },
};

const router = new VueRouter({
    routes: [
        { path: '/user/:id', component: User },
        { path: '/introduction', component: introduction },
        { path: '/settings', component: settings },
        { path: '/medicine/scan', component: medicineScan },
        { path: '*', component: default_ },
        { path: '/medicine/withdrawal/info', component: medicineWithdrawalInfo },
        { path: '/medicine/withdrawal/confirm', component: medicineWithdrawlConfirm},
    ]
});

//https://vuejs.org/v2/cookbook/client-side-storage.html
// ViewModel
const vm = new Vue({
    router,
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
        drawer: null,
        medicine: {
            drugs: {
                drugserErgo: {
                    amount: {
                        target: 2,
                        actual: 0,
                    },
                    name_short: 'Drugser Ergonomics',
                    id: 'Drugser Ergonomics',
                    color: 'red', // TODO
                    text: 'Drugser Ergonomics 0/2', // TODO
                },
                drugserAdultStrength: {
                    amount: {
                        target: 1,
                        actual: 0,
                    },
                    name_short: 'Drugser Adult Strength',
                    id: 'drugserAdultStrength',
                    color: 'red', // TODO
                    text: 'Drugser Adult Strength 0/2', // TODO
                },
            },
            ui: {
                scan: {
                    medicine_missing_text: "TAEST",
                }
            },
            color: {
                unfinished: 'yellow',
                done: 'green',
                none: 'red',
            }
        }
    }),
    methods: {
        // `this` inside methods points to the Vue instance
        routerPush: function (route) {
            this.$router.push(route);
        }
    },
  }).$mount('#app'); // for routing?