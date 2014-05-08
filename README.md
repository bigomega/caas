# caas

## Charting As A Service

Draw all kind of charts with a json or an endpoint that returns a json

### JSON in mutiple formats
- [x] Index and value 
```
    { '0':12, '2':23, '3':34, ... }
```
- [x] Unquoted json 
```
    { 0:34, 1q: 53, 24: 97, ... }
```
- [x] X and Y 
```
    { '0': {x:1, y:1}, 'doesnt_matter': {x:2, y:3}, 'q_34': {x:3, ... }}
```
- [ ] X and Y and Z 
```
    { '0': {x:1, y:1, z:2}, 'doesnt_matter': {x:2, y:3, z:8}, 'q_34': {x:3, ... }}
```

### Array in mutiple formats
- [x] Array of numbers 
```
    [ '0', 34, '51', ... ]
```
- [x] Array of arrays - one line 
```
    [ [0,2], [2,34], [3, 65], ... ] --converts to-- [ {x:0, y:2}, {x:2, y: 34}, ... ]
```
- [ ] Array of arrays - multi lines (index based) 
```
    [ [0,2], [2,34], [3,65], ... ] --converts to-- [ {x:0, y:0}, {x:1, y:2} ... ] and [ {x:0, y:2}, {x:1, y:34}, ... ] 
```
- [ ] Array of arrays - multi dimentional charts (x, y, z, density, color, ... )
```
    [ [0,2,11], [2,34,5], [3,65,30], ... ] --converts to-- [ {x:0, y:2, z:11}, {x:1, y:34, z:3}, ... ]
```

### Using response from a url
- [ ] GET request
- [ ] POST request
- [ ] Better UX to add parameters

### Different chart types
- [x] Line chart
- [ ] Area chart
- [ ] Histogram
- [ ] Bar chart
- [ ] Column chart
- [ ] Pie chart
- [ ] Doughnut chart
- [ ] Bubble chart
- [ ] Scatter plot chart
- [ ] Radar chart
- [ ] Venn diagram
- [ ] Funnel diagram
- [ ] Contour diagram
- [ ] 3D surface charts

- [ ] Multiple entities of any chart (eg., two line charts)
- [ ] Combination of mutiple charts (eg., a line and a bar graph)
- [ ] Options within a chart (sharp and spline, grouped and stacked, surface and wireframe)
- [ ] 2+d charts... 3d, 4d, possibly 5d
- [ ] Print/Export as csv
- [ ] Generate script for chart to be added in any site
