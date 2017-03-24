@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Comment </h4>
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
            <?php
            foreach ($Comment_info as $v_Comment) {
                ?>
                <div class="widget-body">
                    <!-- BEGIN FORM-->
                    {!!Form::open(array('url'=>'/update-comment','method'=>'post'))!!}
                    <div class="control-group">
                        <label class="control-label">Full Comment</label>
                        <div class="controls">
                            <textarea name='comments_description' rows='5' cols="40">{{$v_Comment->comments_description}}</textarea>
                            <input type="hidden" name="comment_id" class="span6 " value="{{$v_Comment->comment_id}}"/>
                        </div>
                    </div>                     
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <select class="span6 " name="publication_status" data-placeholder="" tabindex="1">

                                @if($v_Comment->publication_status==1)
                                <option selected value="1">Yes</option>
                                @else
                                <option  value="1">Yes</option>
                                @endif

                                @if($v_Comment->publication_status==0)
                                <option selected value="0">No</option>
                                @else
                                <option  value="0">No</option>
                                @endif
                            </select>
                        </div>
                    </div>                       
                    <div class="control-group">
                        <label class="control-label">Deletion Status</label>
                        <div class="controls">
                            <select class="span6 " name="deletion_status" data-placeholder="Choose a Category" tabindex="1">

                                @if($v_Comment->deletion_status==1)
                                <option selected value="1">Yes</option>
                                @else
                                <option  value="1">Yes</option>
                                @endif

                                @if($v_Comment->deletion_status==0)
                                <option selected value="0">No</option>
                                @else
                                <option  value="0">No</option>
                                @endif
                            </select>
                        </div>
                    </div>                       
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                    {!! Form::close() !!}

                    <!-- END FORM-->
                </div> 
            <?php } ?>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection