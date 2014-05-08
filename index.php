<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>CAAS</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.min.css">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700|Dancing+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="./css/app.css">
  </head>
  <body>
    <a href="https://github.com/bigomega/caas" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <h1>CaaS</h1>
            <h2>Charting As A Service</h3>
            <h4>by <a href="http://twitter.com/bigomega" target="_blank">@bigOmega</a></h4>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="input-group">
                <input type="text" id="text_field" class="form-control" placeholder="Enter a json, array or a url that returns a json">
                <span class="input-group-btn">
                  <button class="btn btn-danger" type="button" id="draw">Draw</button>
                </span>
              </div>
              <p>And you might see some bullshit down below... </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="container">
                <svg></svg>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 notes">
              <h1>Log:</h1>
              <div class="well well-lg">
                <ul class="list-group">
                  <li class="list-group-item">
                    <h4>JSON in mutiple formats</h4>
                    <ul>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span>Index and value</h5>
                        <pre>{ '0':12, '2':23, '3':34, ... }</pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span>Unquoted json</h5>
                        <pre>{ 0:34, 1q: 53, 24: 97, ... }</pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span>X and Y</h5>
                        <pre>{ '0': {x:1, y:1}, 'doesnt_matter': {x:2, y:3}, 'q_34': {x:3, ... }}</pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>X and Y and Z</h5>
                        <pre>{ '0': {x:1, y:1, z:2}, 'doesnt_matter': {x:2, y:3, z:8}, 'q_34': {x:3, ... }}</pre>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <h4>Array in mutiple formats</h4>
                    <ul>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span>Array of numbers</h5>
                        <pre>[ '0', 34, '51', ... ]</pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span>Array of arrays - one line</h5>
                        <pre>[ [0,2], [2,34], [3, 65], ... ] --converts to-- [ {x:0, y:2}, {x:2, y: 34}, ... ]</pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>Array of arrays - multi lines (index based)</h5>
                        <pre>[ [0,2], [2,34], [3,65], ... ] --converts to-- [ {x:0, y:0}, {x:1, y:2} ... ] and [ {x:0, y:2}, {x:1, y:34}, ... ] </pre>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>Array of arrays - multi dimentional charts (x, y, z, density, color, ... ) </h5>
                        <pre>[ [0,2,11], [2,34,5], [3,65,30], ... ] --converts to-- [ {x:0, y:2, z:11}, {x:1, y:34, z:3}, ... ]</pre>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <h4>Using response from a url</h4>
                    <ul>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>GET request</h5>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>POST request</h5>
                      </li>
                      <li>
                        <h5><span class="glyphicon glyphicon-remove"></span>Better UX to add parameters</h5>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <h4>Different chart types</h4>
                    <ul>
                      <li>
                        <h5><span class="glyphicon glyphicon-ok"></span> Line chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Area chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Histogram</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Bar chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Column chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Pie chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Doughnut chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Bubble chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Scatter plot chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Radar chart</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Venn diagram</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Funnel diagram</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> Contour diagram</h5>
                        <h5><span class="glyphicon glyphicon-remove"></span> 3D surface charts</h5>
                      </li>
                    </ul>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> Multiple entities of any chart (eg., two line charts)</h4>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> Combination of mutiple charts (eg., a line and a bar graph)</h4>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> Options within a chart (sharp and spline, grouped and stacked, surface and wireframe)</h4>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> 2+d charts... 3d, 4d, possibly 5d</h4>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> Print/Export as csv</h4>
                  </li>
                  <li class="list-group-item">
                    <h4><span class="glyphicon glyphicon-remove"></span> Generate script for chart to be added in any site</h4>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://d3js.org/d3.v3.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.min.js"></script>
    <script src="./js/app.js"></script>
  </body>
</html>
