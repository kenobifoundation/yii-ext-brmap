# yii-ext-brmap

Map of Brazil (html5, svg, js) - Interactive map for data visualizations

## Requirements

Tested 1.1.16x

## Usage

```html
<div id="mymapbrazil"></div>
```

```php
$this->widget('application.extensions.brmap.BrMap',array(
    'elementId'=>'mymapbrazil',
    'selectStates' => array('sc', 'sp'),
    'callOnClick' => 'function(element, uf){ alert(uf); }', 
));
```

## Demo And Details

* Access [https://github.com/kenobifoundation/brmap](here).
