console.log('zzz...');
$(function(){
  var draw = function(event){
    var url = $('#text_field').val();
    var val;
    try{ val = eval(url);} catch(e){};
    try{ val = JSON.parse(url);} catch(e){};
    try{ val = JSON.parse(url.replace(/([a-zA-Z0-9_][^:^,^\}]*)(?=\s*:)/g, '"$1"')); } catch(e){};
    if(val){
      if(Object.prototype.toString.call(val) === '[object Object]'){
        if(val[Object.keys(val)[0]].x && val[Object.keys(val)[0]].y){
          // { blah: {x:1, y:1}, blah: {x:2, y:3 ... }}
          val = $.map(val, function(v, i){ return v; });
        } else {
          //{0:12, 2:23, 3:34 ... }
          val = $.map(val, function(v, i){ return {x: parseFloat(i) || 0, y: parseFloat(v) || 0}; });
        }
      } else if(Object.prototype.toString.call(val) === '[object Array]' && val[0]){
        if(Object.prototype.toString.call(val[0]) === '[object Array]'){
          //[[0,2], [0,34], ... ]
          //either its one line or two. lets assume one(should write as two later)
          val = $.map(val, function(v, i){ return {x: parseFloat(v[0]) || 0, y: parseFloat(v[1]) || 0}; });
        } else if(typeof val[0] == 'number' || typeof val[0] =='string'){
          //['0', 34, '51', ... ]
          val = $.map(val, function(v, i){ return {x: i, y: parseFloat(v) || 0}; });
        }
      }
    } else {
      val = [];
      for (var i = 0; i < 100; i++) {
        val.push({x: i, y: Math.sin(i/10)});
      }
    }
    var options = [{
      values: val,
      key: 'Wave 1',
      color: '#ff7f0e',
      area: true
    }];
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
        .axisLabel('X Axis')
        .tickFormat(d3.format(',r'))
        ;

      chart.yAxis
        .axisLabel('Y Axis')
        .tickFormat(d3.format(',r'))
        ;

      d3.select('#container svg')
        .datum(options)
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
