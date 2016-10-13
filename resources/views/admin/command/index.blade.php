@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Command Manager</a></li>
  <li class="current"><a href="#">List</a></li>
</ul>

<div class="inner-content">

    <a href="#" class="button small right" data-reveal-id="command-modal">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th width="200">Command Name</th>
                <th>Command Line</th>
                <th width="50"></th>
                <th width="50"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $command)
            <tr data-id="{{$command->getKey()}}">
                <td>{{$command->getKey()}}</td>
                <td>{{$command->command_name}}</td>
                <td>{{$command->command_line}}</td>
                <td style="text-align:center;"><a class="update-btn" data-reveal-id="command-modal"><i class="fi-widget"></i></a></td>
                <td style="text-align:center;"><a class="alert delete-btn" data-reveal-id="delete-modal"><i class="fi-trash"></i></a></td> 
            </tr>
            @endforeach 
        </tbody>
    </table>
</div> 

<div id="command-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Command</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body">
        {!! Form::open(array('route'=> 'admin.commands.store',  'id' => 'command-form')) !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id"  />
        <div class="row">
            <div class="small-4 columns">
                <label for="right-label" class="right inline">
                    Command Name
                </label>
            </div>
            <div class="small-8 columns"> 
                <input type="text"  name="command_name"/>
            </div>
        </div>

        <div class="row">
            <div class="small-4 columns">
                <label for="right-label" class="right inline">
                    Command Line
                </label>
            </div>
            <div class="small-8 columns"> 
                <textarea name="command_line" rows="10"></textarea>
            </div>
        </div> 
        {!! Form::close() !!}
    </div> 
    <div class="modal-footer"> 
        <a class="button right small save-btn">SAVE</a> 
    </div>
</div>

<div id="delete-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Delete Command</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        {!! Form::open(array('route'=> 'admin.commands.index' ,'id'=> 'delete-form')) !!} 
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div data-alert class="stigma-alert-box alert"> 
            <span class="fi-info"></span>&nbsp; Do you want to delete a command?
        </div>
        {!! Form::close() !!}
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert request-to-delete"><span class="fi-trash"></span>&nbsp;Delete</a> 
    </div>
</div>
@stop

@section('scripts')

<script>
jQuery(function($){
    $('.save-btn').click(function(){
        var $form = $('#command-form');
        var data = $form.serialize();
        var url = $form.attr('action');
        var commandId = $form.find('[name=id]').val();

        if(commandId !== '' && commandId > 0){
            $.ajax({ 
                'type': 'put', 
                'url' : url+'/'+commandId, 
                'data' : data,
                'success':function(){ 
                    location.href = location.href;
               }
            });
        } else {
            $.post(url,data).done(function(){
                location.href = location.href;
            }); 
        }
    });

    var $tr, id; 

    $('.delete-btn').click(function(){
        $tr = $(this).parents('tr');
        id = $tr.data('id');
    });

    $('.request-to-delete').click(function(){
        var $form = $('#command-form');
        var url = $form.attr('action');

        $.ajax({ 
            'type': 'delete', 
            'url' : url+'/'+id,
            'data' : {
                '_token' : $form.find('[name=_token]').val()
            },
            'success':function(){ 
                location.href = location.href;
           }
        });
    });

    $('.update-btn').click(function(){ 
        $tr = $(this).parents('tr');
        id = $tr.data('id'); 
        var $form = $('#command-form');
        var url = $form.attr('action'); 

        $('#command-modal').foundation('reveal', 'open'); 

        $.ajax({
            'type': 'get',
            'url' : url+'/'+id,
            'dataType': 'json',
            'success':function(response){ 
                $form.find('[name=id]').val(response.id);
                $form.find('[name=command_name]').val(response.command_name);
                $form.find('[name=command_line]').val(response.command_line);
           }
        });
    }); 

    $('.close-reveal-modal').click(function() {
        $('#command-form').find('[name=command_name]').val('');
        $('#command-form').find('[name=command_line]').val('');
    });

});
</script>

@stop
