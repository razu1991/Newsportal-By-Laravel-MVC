@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Tag Info</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bullhorn"></i> Tag Name</th>

                            <th> Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_tag as $v_tag) {
                            ?>

                            <tr>
                                <td><a href="#"><?php echo $v_tag->tag_name; ?> </a></td>			
                                <td>					
                                    <a href="{{URL::to('edit-tag/'.$v_tag->id)}}" >
                                        <button class="btn btn-primary"><i class="icon-pencil "></i></button>
                                    </a>
                                    <a href="{{URL::to('delete-tag/'.$v_tag->id)}}" onclick='return check_delete();'>
                                        <button class="btn btn-danger"><i class="icon-trash "></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC PORTLET-->
    </div>
</div>
@endsection