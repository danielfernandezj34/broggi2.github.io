<template>
    <main>
        <div id="container">
            <h4 id="titul_grafic">Incidencies per Provincia</h4>
            <div id="chart_div"></div>
            <div id="chart_div2"></div>
            <div id="chart_div3"></div>
            <div id="chart_div4"></div>
            <div id="chart_div5"></div>
        </div>
    </main>
</template>


<script type="text/javascript">
    export default {
        data() {
            return{
                provincies: [],
                comarques: [],
                barcelona: [],
                girona: [],
                lleida: [],
                tarragona: [],
                item: {
                    row: '',
                    column: ''
                }
            }
        },
        methods: {
            selectProvincies(){
                let me = this;
                axios
                    .get('/provincies_grafic')
                    .then(response => {
                        me.provincies = response.data;
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(me.drawChartProvincies);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectComarques(){
                let me = this;
                axios
                    .get('/comarques_grafic')
                    .then(response => {
                        me.comarques = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectComarquesBarcelona(){
                let me = this;
                axios
                    .get('/comarques_barcelona')
                    .then(response => {
                        me.barcelona = response.data;
                        google.charts.load('current', {packages: ['corechart', 'bar']});
                        google.charts.setOnLoadCallback(me.drawChartComarquesBarcelona);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectComarquesGirona(){
                let me = this;
                axios
                    .get('/comarques_girona')
                    .then(response => {
                        me.girona = response.data;
                        google.charts.load('current', {packages: ['corechart', 'bar']});
                        google.charts.setOnLoadCallback(me.drawChartComarquesGirona);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectComarquesLleida(){
                let me = this;
                axios
                    .get('/comarques_lleida')
                    .then(response => {
                        me.lleida = response.data;
                        google.charts.load('current', {packages: ['corechart', 'bar']});
                        google.charts.setOnLoadCallback(me.drawChartComarquesLleida);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            selectComarquesTarragona(){
                let me = this;
                axios
                    .get('/comarques_tarragona')
                    .then(response => {
                        me.tarragona = response.data;
                        google.charts.load('current', {packages: ['corechart', 'bar']});
                        google.charts.setOnLoadCallback(me.drawChartComarquesTarragona);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            drawChartProvincies() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Provincia');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.provincies.length; index++) {
                    data.addRow([this.provincies[index].Provincia, this.provincies[index].Incidencies]);
                }

                var options = {
                        'title': 'Selecciona la Provincia per veure mes detalls',
                        'is3D':true,
                        'width':0,
                        'height':500,
                        'backgroundColor': 'transparent'
                };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);

                google.visualization.events.addListener(chart, 'select', selectHandler);

                function selectHandler() {
                    var selection = chart.getSelection();
                    for (var i = 0; i < selection.length; i++) {
                        var item = selection[i];
                        if (item.row != null) {

                            if(item.row == 0){
                                if(document.getElementById('chart_div3').style.visibility == "visible"){
                                    document.getElementById('chart_div3').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div4').style.visibility == "visible"){
                                    document.getElementById('chart_div4').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div5').style.visibility == "visible"){
                                    document.getElementById('chart_div5').style.visibility = "hidden";
                                }
                                document.getElementById('chart_div2').style.visibility = "visible";
                            }
                            else if(item.row == 1){
                                if(document.getElementById('chart_div2').style.visibility == "visible"){
                                    document.getElementById('chart_div2').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div4').style.visibility == "visible"){
                                    document.getElementById('chart_div4').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div5').style.visibility == "visible"){
                                    document.getElementById('chart_div5').style.visibility = "hidden";
                                }
                                document.getElementById('chart_div3').style.visibility = "visible";
                            }
                            else if(item.row == 2){
                                if(document.getElementById('chart_div2').style.visibility == "visible"){
                                    document.getElementById('chart_div2').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div3').style.visibility == "visible"){
                                    document.getElementById('chart_div3').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div5').style.visibility == "visible"){
                                    document.getElementById('chart_div5').style.visibility = "hidden";
                                }
                                document.getElementById('chart_div4').style.visibility = "visible";
                            }
                            else if(item.row == 3){
                                if(document.getElementById('chart_div2').style.visibility == "visible"){
                                    document.getElementById('chart_div2').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div3').style.visibility == "visible"){
                                    document.getElementById('chart_div3').style.visibility = "hidden";
                                }
                                if(document.getElementById('chart_div4').style.visibility == "visible"){
                                    document.getElementById('chart_div4').style.visibility = "hidden";
                                }
                                document.getElementById('chart_div5').style.visibility = "visible";
                            }
                        }
                    }

                }
            },
            drawChartComarquesBarcelona() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Comarca');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.comarques.length; index++) {

                    if(this.comarques[index].Provincia == 1){
                        let lastrow = data.addRow([this.comarques[index].Comarca, null]);
                        for (let index2 = 0; index2 < this.barcelona.length; index2++) {
                            if(this.comarques[index].Comarca == this.barcelona[index2].Comarca){
                                data.addRow([this.comarques[index].Comarca, this.barcelona[index2].Incidencies]);
                                data.removeRow(lastrow);
                            }
                        }
                    }
                }

                var options = {
                        'title': 'Barcelona',
                        'width':0,
                        'height':600,
                        'backgroundColor': 'transparent',
                        'legend': {
                            'position': 'none'
                        },

                        'hAxis': {
                            'format':'0',
                            'minValue': 0
                        }
                };

                var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
                chart.draw(data, options);
            },
            drawChartComarquesGirona() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Comarca');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.comarques.length; index++) {

                    if(this.comarques[index].Provincia == 2){
                        let lastrow = data.addRow([this.comarques[index].Comarca, null]);
                        for (let index2 = 0; index2 < this.girona.length; index2++) {
                            if(this.comarques[index].Comarca == this.girona[index2].Comarca){
                                data.addRow([this.comarques[index].Comarca, this.girona[index2].Incidencies]);
                                data.removeRow(lastrow);
                            }
                        }
                    }
                }


                var options = {
                        'title': 'Girona',
                        'width':0,
                        'height':600,
                        'backgroundColor': 'transparent',
                        'legend': {
                            'position': 'none'
                        },
                        'hAxis': {
                            'format':'0',
                            'minValue': 0
                        }
                };

                var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
                chart.draw(data, options);
            },
            drawChartComarquesLleida() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Comarca');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.comarques.length; index++) {

                    if(this.comarques[index].Provincia == 3){
                        let lastrow = data.addRow([this.comarques[index].Comarca, null]);
                        for (let index2 = 0; index2 < this.lleida.length; index2++) {
                            if(this.comarques[index].Comarca == this.lleida[index2].Comarca){
                                data.addRow([this.comarques[index].Comarca, this.lleida[index2].Incidencies]);
                                data.removeRow(lastrow);
                            }
                        }
                    }
                }


                var options = {
                        'title': 'Lleida',
                        'width':0,
                        'height':600,
                        'backgroundColor': 'transparent',
                        'legend': {
                            'position': 'none'
                        },
                        'hAxis': {
                            'format':'0',
                            'minValue': 0
                        }
                };

                var chart = new google.visualization.BarChart(document.getElementById('chart_div4'));
                chart.draw(data, options);
            },
            drawChartComarquesTarragona() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Comarca');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.comarques.length; index++) {

                    if(this.comarques[index].Provincia == 4){
                        let lastrow = data.addRow([this.comarques[index].Comarca, null]);
                        for (let index2 = 0; index2 < this.tarragona.length; index2++) {
                            if(this.comarques[index].Comarca == this.tarragona[index2].Comarca){
                                data.addRow([this.comarques[index].Comarca, this.tarragona[index2].Incidencies]);
                                data.removeRow(lastrow);
                            }
                        }
                    }
                }


                var options = {
                        'title': 'Tarragona',
                        'width':0,
                        'height':600,
                        'backgroundColor': 'transparent',
                        'legend': {
                            'position': 'none'
                        },

                        'hAxis': {
                            'format':'0',
                            'minValue': 0
                        }
                };

                var chart = new google.visualization.BarChart(document.getElementById('chart_div5'));
                chart.draw(data, options);
            }


        },
        created(){
            this.selectProvincies();
            this.selectComarques();
            this.selectComarquesBarcelona();
            this.selectComarquesGirona();
            this.selectComarquesLleida();
            this.selectComarquesTarragona();
        },
        mounted() {
            console.log('Component mounted.');
        }


    }





</script>

