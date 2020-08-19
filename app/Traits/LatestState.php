@extends('layouts.app')

@section('content')
<div class="page-header"><h2> {{ $pageTitle }} <small> {{ $pageNote }} </small> </h2></div>

	{!! Form::open(array('url'=>'revenu?return='.$return, 'class'=>'form-horizontal validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
	<div class="toolbar-nav">
		<div class="row">

			<div class="col-md-6 " >
				<div class="submitted-button">
					<button name="apply" class="tips btn btn-sm   "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>
					<button name="save" class="tips btn btn-sm "  id="saved-button" title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> {{ __('core.sb_save') }} </button>
				</div>
			</div>
			<div class="col-md-6 text-right " >
				<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn   btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
			</div>
		</div>
	</div>


	<div class="p-5">
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="row">
	<div class="col-md-12">
						<fieldset><legend> Revenu</legend>

									  <div class="form-group row  " >
										<label for="Contract" class=" control-label col-md-4 text-left"> Contract <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='contract_id' rows='5' id='contract_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Year" class=" control-label col-md-4 text-left"> Year <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $year = explode(',',$row['year']);
					$year_opt = MyHelpers::years() ?>
					<select name='year' rows='5' required  class='select2 '  >
						<?php
						foreach($year_opt as $key=>$val)
						{
							echo "<option  value ='$val' ".($row['year'] == $val ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Month" class=" control-label col-md-4 text-left"> Month <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $month = explode(',',$row['month']);
					$month_opt =  MyHelpers::monthes() ?>
					<select name='month' rows='5' required  class='select2 '  >
						<?php
						foreach($month_opt as $key=>$val)
						{
							echo "<option  value ='$val' ".($row['month'] == $val ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Source Type" class=" control-label col-md-4 text-left"> Source Type <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $source_type = explode(',',$row['source_type']);
					$source_type_opt =MyHelpers::sourceType() ?>
					<select name='source_type' id="source_type" rows='5' required  class='select2 '  >
						<?php
						foreach($source_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['source_type'] == $key ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
                                      <div class="form-group row  " >
										<label for="source_id" class=" control-label col-md-4 text-left"> Source <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='source_id' rows='5' id='source_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
                                      </div>
									  <div class="form-group row  " >
										<label for="Amount" class=" control-label col-md-4 text-left"> Amount <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}'
						required     class='form-control form-control-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Currency" class=" control-label col-md-4 text-left"> Currency <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='currency_id' rows='5' id='currency_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Serivce Type" class=" control-label col-md-4 text-left"> Serivce Type <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='serivce_type_id' rows='5' id='serivce_type_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Is Collected" class=" control-label col-md-4 text-left"> Is Collected <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $is_collected = explode(',',$row['is_collected']);
					$is_collected_opt = MyHelpers::isCollected() ?>
					<select name='is_collected' rows='5' required  class='select2 '  >
						<?php
						foreach($is_collected_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['is_collected'] == $key ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>
										<div class="col-md-6">
										  <textarea name='notes' rows='5' id='notes' class='form-control form-control-sm '
				           >{{ $row['notes'] }}</textarea>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div> </fieldset></div>

		</div>

		<input type="hidden" name="action_task" value="save" />

		</div>
	</div>
	{!! Form::close() !!}

   <script type="text/javascript">
	$(document).ready(function() {

        if($("#source_id").val() == 1) {
            $("#source_id").jCombo("{!! url('revenu/comboselect?filter=operators:operator_id:operator_title') !!}",
		    {  selected_value : '{{ $row["source_id"] }}' });
        } else {
            $("#source_id").jCombo("{!! url('revenu/comboselect?filter=second_parties:second_party_id:second_party_title') !!}",
		    {  selected_value : '{{ $row["source_id"] }}' });
        }

        $('#source_type').change(function(){
            if(this.value == 1) {
                $("#source_id").jCombo("{!! url('revenu/comboselect?filter=operators:operator_id:operator_title') !!}",
		        {  selected_value : '{{ $row["source_id"] }}' });
            } else {
                $("#source_id").jCombo("{!! url('revenu/comboselect?filter=second_parties:second_party_id:second_party_title') !!}",
		        {  selected_value : '{{ $row["source_id"] }}' });
            }
        })

		$("#contract_id").jCombo("{!! url('revenu/comboselect?filter=contracts:contract_id:contract_code|contract_label') !!}",
		{  selected_value : '{{ $row["contract_id"] }}' });

		$("#currency_id").jCombo("{!! url('revenu/comboselect?filter=currencies:id:title') !!}",
		{  selected_value : '{{ $row["currency_id"] }}' });

		$("#serivce_type_id").jCombo("{!! url('revenu/comboselect?filter=service_types:service_type_id:service_type_title') !!}",
		{  selected_value : '{{ $row["serivce_type_id"] }}' });



		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("revenu/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();
			return false;
		});

	});
	</script>
@stop
@extends('layouts.app')

@section('content')
<div class="page-header"><h2> {{ $pageTitle }} <small> {{ $pageNote }} </small> </h2></div>

	{!! Form::open(array('url'=>'revenu?return='.$return, 'class'=>'form-horizontal validated sximo-form','files' => true ,'id'=> 'FormTable' )) !!}
	<div class="toolbar-nav">
		<div class="row">

			<div class="col-md-6 " >
				<div class="submitted-button">
					<button name="apply" class="tips btn btn-sm   "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-check"></i> {{ __('core.sb_apply') }} </button>
					<button name="save" class="tips btn btn-sm "  id="saved-button" title="{{ __('core.btn_back') }}" ><i class="fa  fa-paste"></i> {{ __('core.sb_save') }} </button>
				</div>
			</div>
			<div class="col-md-6 text-right " >
				<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn   btn-sm "  title="{{ __('core.btn_back') }}" ><i class="fa  fa-times"></i></a>
			</div>
		</div>
	</div>


	<div class="p-5">
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="row">
	<div class="col-md-12">
						<fieldset><legend> Revenu</legend>

									  <div class="form-group row  " >
										<label for="Contract" class=" control-label col-md-4 text-left"> Contract <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='contract_id' rows='5' id='contract_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Year" class=" control-label col-md-4 text-left"> Year <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $year = explode(',',$row['year']);
					$year_opt = MyHelpers::years() ?>
					<select name='year' rows='5' required  class='select2 '  >
						<?php
						foreach($year_opt as $key=>$val)
						{
							echo "<option  value ='$val' ".($row['year'] == $val ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Month" class=" control-label col-md-4 text-left"> Month <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $month = explode(',',$row['month']);
					$month_opt =  MyHelpers::monthes() ?>
					<select name='month' rows='5' required  class='select2 '  >
						<?php
						foreach($month_opt as $key=>$val)
						{
							echo "<option  value ='$val' ".($row['month'] == $val ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Source Type" class=" control-label col-md-4 text-left"> Source Type <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $source_type = explode(',',$row['source_type']);
					$source_type_opt =MyHelpers::sourceType() ?>
					<select name='source_type' id="source_type" rows='5' required  class='select2 '  >
						<?php
						foreach($source_type_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['source_type'] == $key ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
                                      <div class="form-group row  " >
										<label for="source_id" class=" control-label col-md-4 text-left"> Source <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='source_id' rows='5' id='source_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
                                      </div>
									  <div class="form-group row  " >
										<label for="Amount" class=" control-label col-md-4 text-left"> Amount <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='amount' id='amount' value='{{ $row['amount'] }}'
						required     class='form-control form-control-sm ' />
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Currency" class=" control-label col-md-4 text-left"> Currency <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='currency_id' rows='5' id='currency_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Serivce Type" class=" control-label col-md-4 text-left"> Serivce Type <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='serivce_type_id' rows='5' id='serivce_type_id' class='select2 ' required  ></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Is Collected" class=" control-label col-md-4 text-left"> Is Collected <span class="asterix"> * </span></label>
										<div class="col-md-6">

					<?php $is_collected = explode(',',$row['is_collected']);
					$is_collected_opt = MyHelpers::isCollected() ?>
					<select name='is_collected' rows='5' required  class='select2 '  >
						<?php
						foreach($is_collected_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['is_collected'] == $key ? " selected='selected' " : '' ).">$val</option>";
						}
						?></select>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div>
									  <div class="form-group row  " >
										<label for="Notes" class=" control-label col-md-4 text-left"> Notes </label>
										<div class="col-md-6">
										  <textarea name='notes' rows='5' id='notes' class='form-control form-control-sm '
				           >{{ $row['notes'] }}</textarea>
										 </div>
										 <div class="col-md-2">

										 </div>
									  </div> </fieldset></div>

		</div>

		<input type="hidden" name="action_task" value="save" />

		</div>
	</div>
	{!! Form::close() !!}

   <script type="text/javascript">
	$(document).ready(function() {

        if($("#source_id").val() == 1) {
            $("#source_id").jCombo("{!! url('revenu/comboselect?filter=operators:operator_id:operator_title') !!}",
		    {  selected_value : '{{ $row["source_id"] }}' });
        } else {
            $("#source_id").jCombo("{!! url('revenu/comboselect?filter=second_parties:second_party_id:second_party_title') !!}",
		    {  selected_value : '{{ $row["source_id"] }}' });
        }

        $('#source_type').change(function(){
            if(this.value == 1) {
                $("#source_id").jCombo("{!! url('revenu/comboselect?filter=operators:operator_id:operator_title') !!}",
		        {  selected_value : '{{ $row["source_id"] }}' });
            } else {
                $("#source_id").jCombo("{!! url('revenu/comboselect?filter=second_parties:second_party_id:second_party_title') !!}",
		        {  selected_value : '{{ $row["source_id"] }}' });
            }
        })

		$("#contract_id").jCombo("{!! url('revenu/comboselect?filter=contracts:contract_id:contract_code|contract_label') !!}",
		{  selected_value : '{{ $row["contract_id"] }}' });

		$("#currency_id").jCombo("{!! url('revenu/comboselect?filter=currencies:id:title') !!}",
		{  selected_value : '{{ $row["currency_id"] }}' });

		$("#serivce_type_id").jCombo("{!! url('revenu/comboselect?filter=service_types:service_type_id:service_type_title') !!}",
		{  selected_value : '{{ $row["serivce_type_id"] }}' });



		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("revenu/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();
			return false;
		});

	});
	</script>
@stop

  @if($field['field'] == 'is_collected')
	{!! MyHelpers::isCollected($row->{$field['field']}) !!}
	@elseif($field['field'] == 'source_type')
	{!! MyHelpers::sourceType($row->{$field['field']}) !!}
	@elseif($field['field'] == 'source_id')
	{!! MyHelpers::source($row->source_type,$row->{$field['field']}) !!}
	@else

    public static function years($key = null)
    {
       $array = array_merge( range(date('Y')-5 , date('Y')) , range(date('Y'), date('Y')+5) );

       return $key ? $array[$key] : $array;
    }
    public static function monthes($key = null)
    {
       $array = array('1' => 'January' ,  '2' => 'February' ,  '3' => 'March' ,  '4' => 'April' ,  '5' => 'May' ,  '6' => 'June' ,  '7' => 'July' ,  '8' => 'August' ,  '9' => 'September' ,  '10' => 'October' , '11' => 'November', '12' => 'December');

       return $key ? $array[$key] : $array;
    }
    public static function sourceType($key = null)
    {
       $array =  array( '1' => 'Operator' ,  '2' => 'Aggregator' , );

       return $key ? $array[$key] : $array;
    }
    public static function isCollected($key = null)
    {
       $array =  array( '1' => 'yes' ,  '2' => 'no' , );

       return $key ? $array[$key] : $array;
    }
    public static function source($source_type, $source_id)
    {
       if($source_type == 1) {
        return operators::where('operator_id', $source_id)->first()->operator_title;
       } else {
        return secondparties::where('second_party_id', $source_id)->first()->second_party_title;
       }
    }
