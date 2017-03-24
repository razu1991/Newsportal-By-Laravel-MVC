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
                {!! Form::open(array('url' => 'save-News', 'method' => 'post','files'=>'true' )) !!}

                <div class="control-group">
                    <label class="control-label">News Title</label>
                    <div class="controls">
                        <input type="text" name="News_title" class="span6 " />
                    </div>
                </div>                              

                <div class="control-group">
                    <label class="control-label">News Summery</label>
                    <div class="controls">
                        <textarea name='News_summery' rows='3' cols="100"></textarea>
                    </div>
                </div>                              
                <div class="control-group">
                    <label class="control-label">Full News</label>
                    <div class="controls">
                        <textarea name='full_News' rows='3' cols="100"></textarea>
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
                    <label class="control-label">News Image</label>
                    <div class="controls">
                        <input type="file" name="image" class="span6 " />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">News Image1</label>
                    <div class="controls">
                        <input type="file" name="image1" class="span6 " />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">News Image2</label>
                    <div class="controls">
                        <input type="file" name="image2" class="span6 " />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Publication Status</label>
                    <div class="controls">
                        <select class="span6 " name="publication_status" data-placeholder="Choose a Category" tabindex="1">
                            <option value="">Select...</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>               
                <div class="control-group">
                    <label class="control-label" for="textarea2">Featured News</label>
                    <div class="controls">
                        <select name="featured_News">
                            <option>Select status..</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">Breaking News</label>
                    <div class="controls">
                        <select name="breaking_News">
                            <option>Select status..</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save News</button>
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