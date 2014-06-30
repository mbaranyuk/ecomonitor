$(function() {

    // Get the CSV and create the chart
    $.get('http://www.highcharts.com/samples/highcharts/demo/line-ajax/analytics.csv', function(csv) {

        $('#chart').highcharts({
            
        });
        
    });
});