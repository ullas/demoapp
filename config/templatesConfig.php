<?php
$config = [
    'Templates'=>[
        'shortForm' => [
         	'button' => '<button class="btn btn-primary" {{attrs}}>{{text}}</button>',
            'formStart' => '<form class="m50" {{attrs}}>',
            'label' => '<label class="col-md-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-md-4"><input class="form-control" type="{{type}}" name="{{name}}" {{attrs}} /></div>',
            'select' => '<div class="col-md-2"><select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div>',
            'inputContainer' => '<div class="form-group row {{required}}" form-type="{{type}}">{{content}}</div>',
            'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
            'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
            'hidden' => '<input type="hidden" name="{{name}}"{{attrs}}/>',
            'checkContainer' => '',],
        'longForm' => [
            'formstart' => '<form class="" {{attrs}}>',
            'label' => '<label class="col-md-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-md-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
            'select' => '<div class="col-md-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',
            'checkContainer' => '',],
        'fullForm' => [
            'formstart' => '<form class="" {{attrs}}>',
            'label' => '<label class="col-md-2 control-label" {{attrs}}>{{text}}</label>',
            'input' => '<div class="col-md-10"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',
            'select' => '<div class="col-md-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">{{content}}</div>',
            'checkContainer' => '',]
    ]
];