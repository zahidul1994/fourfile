


<div class="row">
    <div class="input-field col m6 s12">
        {!! Form::text('name', null, ['id' => 'name','required']) !!}
        {!! Form::label('name', 'Name *') !!}
  
    </div>
  <div class="input-field col m6 s12">
      {!! Form::number('phone', null, ['id' => 'phone', 'required']) !!}
      {!! Form::label('phone', ' * Phone') !!}

  </div>

 


<div class="input-field col m6 s12">
<div class="row">
  <div class="col m2">
    {!! Form::label('thana_id', 'Select Thana *') !!}
</div>
<div class="col m10">
    {!! Form::select('thana_id', $thana, null, ['id' => 'thana_id','class'=>'select2 browser-default validate', 'placeholder' => 'Select Thana']) !!}
  </div>
  </div>
  </div>
  
 
    <div class="input-field col m6 s12">
  
      <select class="select2 browser-default" id="area_id" name="area_id" required>
           <option value="">Select Area *</option>
         </select>

   
    
</div>
</div>

<div class="row">
  <div class="input-field col m12 s12">
      {!! Form::text('message', null, ['id' => 'message']) !!}
      {!! Form::label('message', 'Customer Message') !!}

  </div>
  <div class="input-field col m12 s12">
      {!! Form::text('replymessage', null, ['id' => 'replymessage']) !!}
      {!! Form::label('replymessage', 'Reply Text') !!}
  </div>

</div>
