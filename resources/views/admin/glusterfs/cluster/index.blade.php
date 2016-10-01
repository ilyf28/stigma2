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
                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->getKey()}}</td>
                <td>{{$item->cluster_name}}</td>
                <td>{{$item->alias}}</td>
                <td style="text-align:center;"><a class="button info tiny" href="{{route('admin.glusterfs.clusters.edit', array($item->getKey()))}}">Manage</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 

@stop
