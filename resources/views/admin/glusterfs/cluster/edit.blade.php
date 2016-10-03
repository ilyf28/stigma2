@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">GlusterFS Cluster Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.glusterfs.clusters.update',$cluster->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.glusterfs.cluster.editForm') 
{!! Form::close() !!}
@stop

<div id="volume-delete-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Delete Volume</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        {!! Form::open(array('url'=> '/admin/glusterfs/clusters/volume','id'=> 'volume-delete-form')) !!} 
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div data-alert class="stigma-alert-box alert"> 
            <span class="fi-info"></span>&nbsp; Do you want to delete a volume?
        </div>
        {!! Form::close() !!}
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert request-to-delete-volume"><span class="fi-trash"></span>&nbsp;Delete</a> 
    </div>
</div>

<div id="cluster-delete-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Delete Cluster</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        {!! Form::open(array('route'=> 'admin.glusterfs.clusters.index','id'=> 'cluster-delete-form')) !!} 
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div data-alert class="stigma-alert-box alert"> 
            <span class="fi-info"></span>&nbsp; Do you want to delete a cluster?
        </div>
        {!! Form::close() !!}
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert request-to-delete-cluster"><span class="fi-trash"></span>&nbsp;Delete</a> 
    </div>
</div>

@section('scripts')
<script> 
jQuery(function($){
    var cluster_id, volume_id; 

    $('.volume-delete-btn').click(function(){
        volume_id = $(this).data('volume-id');
    });
    $('.cluster-delete-btn').click(function(){
        cluster_id = $(this).data('cluster-id');
    });

    $('.request-to-delete-volume').click(function(){
        var $volumeForm = $('#volume-delete-form');
        var data = $volumeForm.serialize();
        var url = $volumeForm.attr('action');

        $.ajax({ 
            'type': 'delete', 
            'url' : url+'/'+volume_id, 
            'data' : {
                '_token' : $volumeForm.find('[name=_token]').val()
            },
            'success':function(){ 
                location.href = location.href;
            }
        });
    });

    $('.request-to-delete-cluster').click(function(){
        var $clusterForm = $('#cluster-delete-form');
        var data = $clusterForm.serialize();
        var url = $clusterForm.attr('action');

        $.ajax({ 
            'type': 'delete', 
            'url' : url+'/'+cluster_id, 
            'data' : {
                '_token' : $clusterForm.find('[name=_token]').val()
            },
            'success':function(){ 
                location.href = '/admin/glusterfs/clusters';
            }
        });
    });
});
</script>
@stop