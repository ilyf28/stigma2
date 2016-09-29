@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">GlusterFS Cluster Manager</a></li>
  <li class="current"><a href="#">List</a></li>
</ul>

<div class="inner-content">

    <a href="{{route('admin.glusterfs.clusters.create')}}" class="button small right" >Create</a>

    <table class="table">
        <thead>
            <tr>
                <th width="50">#</th>
                <th width="200">Cluster Name</th>
                <th>Alias</th>
                <th width="50"></th>
                <th width="50"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->getKey()}}</td>
                <td>{{$item->cluster_name}}</td>
                <td>{{$item->alias}}</td>
                <td style="text-align:center;"><a class="update-btn" href="{{route('admin.glusterfs.clusters.edit', array($item->getKey()))}}"><i class="fi-widget"></i></a></td>
                <td style="text-align:center;"><a class="alert delete-btn" data-reveal-id="delete-modal" data-cluster-id="{{$item->getKey()}}"><i class="fi-trash"></i></a></td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 

<div id="delete-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Delete Cluster</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        {!! Form::open(array('route'=> 'admin.glusterfs.clusters.index' ,'id'=> 'delete-form')) !!} 
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div data-alert class="stigma-alert-box alert"> 
            <span class="fi-info"></span>&nbsp; Do you want to delete a cluster?
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
    var id; 

    $('.delete-btn').click(function(){
        id = $(this).data('cluster-id');
    });

    $('.request-to-delete').click(function(){
        var $form = $('#delete-form');
        var data = $form.serialize();
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
});
</script>
@stop
