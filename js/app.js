console.log('zzz...');
$(function(){
  var draw = function(event){
    var url = $('#text_field').val();
    // var val = eval(url);
    // $.ajax({
    //   url: '/fetch'
    //   type: 'POST',
    //   data: {'url': encodeURIComponent(url)},
    //   success: function(data){},
    //   error: function(response){}
    // });

    nv.addGraph(function() {
      var chart = nv.models.lineChart()
        .useInteractiveGuideline(true)
        .showLegend(true)
        ;

      chart.xAxis
        .axisLabel('Time (ms)')
        .tickFormat(d3.format(',r'))
        ;

      chart.yAxis
        .axisLabel('Voltage (v)')
        .tickFormat(d3.format('.02f'))
        ;

      d3.select('#container svg')
        .datum(sinAndCos())
        .transition().duration(500)
        .call(chart)
        ;

      nv.utils.windowResize(chart.update);

      return chart;
    });
    function sinAndCos() {
      var sin = [],sin2 = [],
          cos = [];

      for (var i = 0; i < 100; i++) {
        sin.push({x: i, y: Math.sin(i/10)});
        sin2.push({x: i, y: Math.sin(i/10) *0.25 + 0.5});
        cos.push({x: i, y: .5 * Math.cos(i/10)});
      }

      //Line chart data should be sent as an array of series objects.
      return [
        {
          values: sin,      //values - represents the array of {x,y} data points
          key: 'Sine Wave', //key  - the name of the series.
          color: '#ff7f0e'  //color - optional: choose your own line color.
        },
        {
          values: cos,
          key: 'Cosine Wave',
          color: '#2ca02c',
          area: true
        },
        {
          values: sin2,
          key: 'Another sine wave',
          color: '#7777ff',
          area: true      //area - set to true if you want this line to turn into a filled area chart.
        }
      ];
    }


  };
  $('#draw').click(draw);
  $('#text_field').on('keydown', function (event){
    if(event.keyCode == 13)
      draw(event);
  });
});
