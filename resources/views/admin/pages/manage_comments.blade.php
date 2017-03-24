@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Comments</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bookmark"></i> User</th>
                            <th><i class="icon-bullhorn"></i> News</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Comments</th>
                            <th><i class="icon-bookmark"></i> Comment Status</th>					
                            <th> Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>	
                        @foreach($all_comments as $v_comments)
                        <tr>
                            <td><a href="#"></a>{{$v_comments->users->name}}</td>
                            <td><a href="#"></a>{{$v_comments->newses->news_title}}</td>
                            <td><a href="#"></a>{{$v_comments->comments_description}}</td>                          
                            <td class="hidden-phone"><?php
                                if ($v_comments->publication_status == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($v_comments->publication_status == 0) {
                                    ?>
                                    <a href="{{URL::to('/publish-comment/'.$v_comments->comment_id)}}"><button class="btn btn-success"><i class="icon-ok"></i></button></a> 
                                    <?php
                                } else {
                                    ?>
                                    <a href="{{URL::to('/unpublish-comment/'.$v_comments->comment_id)}}"> <button class="btn btn-danger"><i class="icon-remove"></i></button></a>
                                <?php } ?>
                                <a href="{{URL::to('edit-comment/'.$v_comments->comment_id)}}" ><button class="btn btn-primary"><i class="icon-pencil "></i></button></a>
                                <a href="{{URL::to('delete-comment/'.$v_comments->comment_id)}}" onclick='return check_delete();'><button class="btn btn-danger"><i class="icon-trash "></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC PORTLET-->
    </div>
</div>
@endsection