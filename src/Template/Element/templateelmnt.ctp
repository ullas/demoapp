<?php
  $myTemplates = [
 	// 'checkbox' => '<input class="col-sm-6" type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // 'checkboxFormGroup' => '{{label}}<div class="col-sm-6">{{input}}</div>',
  	// 'nestingLabel' => '<label class="col-sm-3 control-label"{{attrs}}>{{text}}</label>',
    
    'inputContainerError' => '<div class="col-md-4"><div class="form-group {{type}}{{required}} has-error">{{content}}</div></div>',
    
    'inputContainer' => '<div class="col-md-4"><div class="form-group {{type}}">{{content}}</div></div>',
    'label' => '<label class="control-label" {{attrs}}>{{text}}</label>',
    'input' => '{{opentag}}<div class="input-group">{{icon}}<input type="{{type}}" name="{{name}}"{{attrs}}/></div>{{closetag}}',
    'select' => '<div class="input-group">{{icon}}<select style="width:1px;" class="select2 form-control select2-hidden-accessible mptlw1" name="{{name}}"{{attrs}}>{{content}}</select></div>',
    // 'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
    'dateContainer' => '<div class="col-md-4"><div class="form-group">{{content}}</div></div>',
    // 'dateWidget' => '<div class="input-group" ><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control mptldp" name="{{name}}"{{attrs}} /></div>'
    // 'select' => '<select class="form-control class2" name="{{name}}"{{attrs}}>{{content}}</select>',      
];
$this->Form->templates($myTemplates);

?>