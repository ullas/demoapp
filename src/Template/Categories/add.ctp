<section class="content-header">
  <h1>
    Category
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($category, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('parent_id', ['options' => $parentCategories, 'empty' => true]);
            echo $this->Form->input('lft');
            echo $this->Form->input('rght');
            echo $this->Form->input('name');
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>


<fieldset>
   <input type="hidden" name="data[VmfrDesignatedIncome][0][id]" value="668" id="VmfrDesignatedIncome0Id"/>
   <div class="input text">
   <label for="VmfrDesignatedIncome0Designation">Designation</label>
   <input name="data[VmfrDesignatedIncome][0][designation]" value="blah" maxlength="512" type="text" id="VmfrDesignatedIncome0Designation"/></div>
   </fieldset>

    <fieldset>
    <input type="hidden" name="data[VmfrDesignatedIncome][1][id]" value="669" id="VmfrDesignatedIncome1Id"/>
    <div class="input text">
    <label for="VmfrDesignatedIncome1Designation">Designation</label>  

    <input name="dataVmfrDesignatedIncome1" value="blah2" maxlength="512" type="text" id="VmfrDesignatedIncome1Designation"/></div>
    </fieldset>

     <a href="#" id="addrow">Add row</a>
 
<input type="button" value="Add" class="btn btn-info" onClick="addCont()">
<div id="cont_div"></div>
</section>
<script language="javascript">
RegExp.quote = function(str) {
     return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
 };

function findNumberAddOne(attributeString) {
    /*Finds the number in the given string
    ** and returns a string with that number increased by one
    */
    var re = new RegExp("(.*)([0-9])(.*)");
    var nPlusOne = attributeString.replace(re, "$2")+"+1";
    var newstr = attributeString.replace(re, "$1")+eval(nPlusOne)+attributeString.replace(re, "$3");
    return newstr;
}

$(document).ready(function() {
/* Duplicate the last set of designated income fields and increase the relevants id/name etc.
** so that it works as a new row in the table when saved*/
    $('#addrow').click(function() { 
        $('fieldset:last').clone().insertAfter('fieldset:last');
        $('fieldset:last > input').attr('id',findNumberAddOne($('fieldset:last > input').attr('id')));
        $('fieldset:last > input').attr('value',''); /*Blank out the actual value*/
        $('fieldset:last > input').attr('name',findNumberAddOne($('fieldset:last > input').attr('name')));
        $('fieldset:last > div > label').attr('for',findNumberAddOne($('fieldset:last > div > label').attr('for')));
        $('fieldset:last > div > input').attr('id',findNumberAddOne($('fieldset:last > div > input').attr('id')));
        $('fieldset:last > div > input').attr('value',''); /*Blank out the actual value*/
        $('fieldset:last > div > input').attr('name',findNumberAddOne($('fieldset:last > div > input').attr('name')));
    });
});
var i = 1;
function addCont()
{

cont_div.innerHTML = cont_div.innerHTML +"<br><input type='text' name='mytext"+ i +"'>";
i++;
}
</script>