<?php
  $myTemplates = [
 	// 'checkbox' => '<input class="col-sm-6" type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // 'checkboxFormGroup' => '{{label}}<div class="col-sm-6">{{input}}</div>',
  	// 'nestingLabel' => '<label class="col-sm-3 control-label"{{attrs}}>{{text}}</label>',
    
    'inputContainer' => '<div class="col-md-6"><div class="form-group {{type}}">{{content}}</div></div>',
    'label' => '<label class="control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="input-group">{{icon}}<input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    // 'selectContainer' => '<div class="input-group">{{icon}}</div>{{content}}',
    // 'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
    'dateContainer' => '<div class="col-md-6"><div class="form-group">{{content}}</div></div>',
    // 'dateWidget' => '<div class="input-group" ><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control mptldp" name="{{name}}"{{attrs}} /></div>'
    // 'select' => '<select class="form-control class2" name="{{name}}"{{attrs}}>{{content}}</select>',      
];
$this->Form->templates($myTemplates);

?>