


<div class="row">
    <div class="input-field col m4 s12">
        {!! Form::text('name', null, ['id' => 'name','required']) !!}
        {!! Form::label('name', 'Name *') !!}
  
    </div>
  <div class="input-field col m4 s12">
      {!! Form::number('phone', null, ['id' => 'phone', 'required']) !!}
      {!! Form::label('phone', ' * Phone') !!}

  </div>
  <div class="input-field col m4 s12">
      {!! Form::email('email', null, ['id' => 'email']) !!}
      {!! Form::label('email', 'Email') !!}

  </div>

  <div class="input-field col m12 s12">
      {!! Form::text('address', null, ['id' => 'address']) !!}
      {!! Form::label('address', 'Address') !!}

  </div>
  <div class="input-field col m12 s12">
      {!! Form::text('comment', null, ['id' => 'comment']) !!}
      {!! Form::label('comment', 'Comment') !!}
  </div>

</div>
