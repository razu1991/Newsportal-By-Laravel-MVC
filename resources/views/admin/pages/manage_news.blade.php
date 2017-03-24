@extends('admin.admin_master')
@section('admin_maincontent')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <br>
            {!! Form::open(array('url' => 'search-News', 'method' => 'post' )) !!}

            <table width="400px" align="center">
                <tr>
                    <td><input type="text" name="search_text" placeholder="Search Text" size="50"></td>
                    <td><input type="submit" name="btn" value="search"> </td>
                </tr>
            </table>
            {!! Form::close() !!}
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon-bullhorn"></i> News Name</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> News Summery</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Full News</th>
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Images</th>     
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Breaking News</th>     
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Featured News</th>     
                            <th class="hidden-phone"><i class="icon-question-sign"></i> Publication Status</th>

                            <th> Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_manage_News as $v_News) {
                            ?>

                            <tr>
                                <td style="width:15%"><a href="#">{{ $v_News->news_title }} </a></td>
                                <td class="hidden-phone" style="width:25%">{{ $v_News->news_summery }}</td>
                                <td class="hidden-phone">{{ $v_News->full_news }}</td>
                                <td class="hidden-phone">
                                    <img  style="height:70px;widht:100px;" src="{{$v_News->news_image}}" alt="image" />
                                </td>
                                <td class="hidden-phone"><?php
                                    if ($v_News->breaking_news == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td class="hidden-phone"><?php
                                    if ($v_News->featured_news == 1) {
                                        echo 'Yes';
                                    } else {
                                        echo 'No';
                                    }
                                    ?>
                                </td>                                
                                <td class="hidden-phone"><?php
                                    if ($v_News->publication_status == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($v_News->publication_status == 0) {
                                        ?>
                                        <a href="{{URL::to('/publish-News/'.$v_News->id)}}"><button class="btn btn-success"><i class="icon-ok"></i></button></a> 
                                        <?php
                                    } else {
                                        ?>
                                        <a href="{{URL::to('/unpublish-News/'.$v_News->id)}}"> <button class="btn btn-danger"><i class="icon-remove"></i></button></a>
                                    <?php } ?>
                                    <a href="{{URL::to('edit-News/'.$v_News->id)}}" ><button class="btn btn-primary"><i class="icon-pencil "></i></button></a>
                                    <a href="{{URL::to('delete-News/'.$v_News->id)}}" onclick='return check_delete();'><button class="btn btn-danger"><i class="icon-trash "></i></button></a>
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