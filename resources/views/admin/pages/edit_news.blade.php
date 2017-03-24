@extends('admin.admin_master')
@section('admin_maincontent')          

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit News </h4>
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
            foreach ($News_info as $v_News) {
                ?>
                <div class="widget-body">
                    <!-- BEGIN FORM-->

                    {!!Form::open(array('url'=>'/update-News','method'=>'post','files'=>'true'))!!}
                    <div class="control-group">
                        <label class="control-label">News Name</label>
                        <div class="controls">
                            <input type="text" name="News_title" class="span6 " value="{{$v_News->news_title}}"/>
                            <input type="hidden" name="id" class="span6 " value="{{$v_News->id}}"/>
                        </div>
                    </div>
                    <?php
                    $all_published_category = DB::table('category')
                            ->select("*")
                            ->where('publication_status', 1)
                            ->get();
                    ?>

                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <select name="category_id">
                                <?php
                                foreach ($all_published_category as $v_category) {
                                    ?>
                                    <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>

                                <?php } ?>
                            </select>   
                        </div>
                    </div>
                    <?php
                    $all_tag = DB::table('tags')
                            ->select("*")
                            ->get();
                    ?>
                    <div class="control-group">
                        <label class="control-label">Tag Name</label>
                        <div class="controls">
                            <select name="tag_id">
                                <?php
                                foreach ($all_tag as $v_tag) {
                                    ?>
                                    <option value="{{$v_tag->id}}">{{$v_tag->tag_name}}</option>

                                <?php } ?>
                            </select>   
                        </div>
                    </div>

                    <div class="control-group">                                             
                        <div class="control-group">
                            <label class="control-label">News Summery</label>
                            <div class="controls">
                                <textarea name='News_summery' rows='5' cols="40">{{$v_News->news_summery}}</textarea>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Full News</label>
                            <div class="controls">
                                <textarea name='full_News' rows='5' cols="40">{{$v_News->full_news}}</textarea>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">News Image</label>
                            <div class="controls">
                                <img  style="height:70px;widht:100px;" src="{{asset($v_News->news_image)}}" alt="image" />					
                                <input type="file" name="image" class="span6 "/>

                            </div>
                        </div>
                        <!--                <div>
                                           //<?php
                        $image_info = $v_News->news_image;
//                        unlink($image_info);
                        ?>  
                                             
                                        </div>-->
                        <div class="control-group">
                            <label class="control-label">Publication Status</label>
                            <div class="controls">
                                <select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">

                                    @if($v_News->publication_status==1)
                                    <option selected value="1">Published</option>
                                    @else
                                    <option  value="1">Published</option>
                                    @endif

                                    @if($v_News->publication_status==0)
                                    <option selected value="0">Unpublished</option>
                                    @else
                                    <option  value="0">Unpublished</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Featured News</label>
                            <div class="controls">
                                <select class="span6 " name="featured_News" data-placeholder="Choose a Category" tabindex="1">

                                    @if($v_News->featured_news==1)
                                    <option selected value="1">Yes</option>
                                    @else
                                    <option  value="1">Yes</option>
                                    @endif

                                    @if($v_News->featured_news==0)
                                    <option selected value="0">No</option>
                                    @else
                                    <option  value="0">No</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Breaking News</label>
                            <div class="controls">
                                <select class="span6 " name="breaking_News" data-placeholder="Choose a Category" tabindex="1">

                                    @if($v_News->breaking_news==1)
                                    <option selected value="1">Yes</option>
                                    @else
                                    <option  value="1">Yes</option>
                                    @endif

                                    @if($v_News->breaking_news==0)
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