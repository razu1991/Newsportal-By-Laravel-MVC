@extends('admin.admin_master')
@section('admin_maincontent')          

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Sample Form </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <h2 style="color:green;">
                <?php
                echo Session::get('message');
                echo Session::put('message', '');
                ?>
            </h2>
            <div class="widget-body">
                <!-- BEGIN FORM-->
                {!! Form::open(array('url' => 'save-tag', 'method' => 'post' )) !!}
                <div class="control-group">
                    <label class="control-label">Tag Name</label>
                    <div class="controls">
                        <input type="text" name="tag_name" class="span6 " />
                    </div>
                </div>                                                                                                   
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn">Cancel</button>
                </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection