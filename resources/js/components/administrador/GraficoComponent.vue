<template>
    <main>

        <div id="chart_div"></div>

    </main>
</template>


<script type="text/javascript">
    export default {
        data() {
            return{
                provincies: []
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
                        google.charts.setOnLoadCallback(me.drawChart);
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Provincia');
                data.addColumn('number', 'Incidencies');
                for (let index = 0; index < this.provincies.length; index++) {
                    data.addRow([this.provincies[index].Provincia, this.provincies[index].Incidencies]);
                }

                var options = {'title':'Incidencies per Provincia',
                        'is3D':true,
                        'width':700,
                        'height':500,
                        'backgroundColor': 'transparent'
                };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }


        },
        created(){
            this.selectProvincies();
        },
        mounted() {
            console.log('Component mounted.');
        }


    }





</script>

