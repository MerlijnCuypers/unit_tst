$('span[data-toggle="tooltip"]').tooltip({
    html: true
});
google.charts.load("current", {packages: ["corechart"]});
google.charts.setOnLoadCallback(getData);
function getData() {
    $.ajax({
        url: "report/totalReport",
        type: 'GET',
        success: function (response) {
            var data = google.visualization.arrayToDataTable(response);
            var options = { 
                pieHole: 0.4,
                colors: ['#ADFF2F', '#00FF00', '#7FFF00', '#008000', '#7CFC00', '#32CD32', '#228B22'],
                chartArea: {left: 5, top: 20, width: '100%', height: '90%'}
            };
            var chart = new google.visualization.PieChart(document.getElementById('totalPiechart'));
            chart.draw(data, options);
        },
        // error handling
        error: function (response, textStatus, errorThrown) {

        }
    });
}



$(function () {
    $.ajax({
        url: "report/flowReport",
        type: 'GET',
        success: function (response) {
            $.plot("#popularityLineChart", response, {
                xaxis: {
                    mode: "time"
                }
            });
        },
        // error handling
        error: function (response, textStatus, errorThrown) {

        }
    });
});