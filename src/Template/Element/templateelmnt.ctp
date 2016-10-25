<?php
  $myTemplates = [
 	// 'checkbox' => '<input class="col-sm-6" type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // 'checkboxFormGroup' => '{{label}}<div class="col-sm-6">{{input}}</div>',
  	// 'nestingLabel' => '<label class="col-sm-3 control-label"{{attrs}}>{{text}}</label>',
    
    'inputContainer' => '<div class="col-md-6"><div class="form-group {{type}}">{{content}}</div></div>',
    // 'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    // 'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    // 'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
    // 'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
    'dateContainer' => '<div class="col-md-6"><div class="form-group">{{content}}</div></div>',
    'dateWidget' => '<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control mptldp" name="{{name}}" {{attrs}} /></div>'
            
];
$this->Form->templates($myTemplates);

?>