<div class="row">
  <div class="row">
    
    <div class="input-field col m12 s12">
     
    {!! Form::label('thana_id', '*Select Thana') !!}
    </div> <div class="input-field col m12 s12">
     
    {!! Form::select('thana_id', $thana, null, ['id' => 'thana_id','class'=>'select2 browser-default', 'placeholder' => 'Select Thana']) !!}
</div>
  <div class="input-field col m12 s12">
    {!!Form::text('areaname',null, array('id'=>'title','required'))!!}
    {!!Form::label('title',' * Area Name * ')!!}
    
</div>
</div>
  
