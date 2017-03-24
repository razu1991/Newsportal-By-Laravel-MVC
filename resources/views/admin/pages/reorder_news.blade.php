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
            @if(Session::has('reorder_Fail'))
            <h3 class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('reorder_Fail') }}</h3>
            @endif
            <div class="widget-body">
                <!-- BEGIN FORM-->
                {!! Form::open(array('url' => 'reorder-News-sucess', 'method' => 'post','files'=>'true' )) !!}

                <div class="control-group">
                    <label class="control-label">News Title</label>
                    <div class="controls">
                        <input type="text" readonly="true"  name="News_title" value="{{$reorder_News->News_title}}" class="span6 " />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Manufacturer</label>
                    <div class="controls">
                        <input type="text" readonly="true"  name="manufacturer_name" value="{{$reorder_News->manufacturer_name}}" class="span6 " />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">News Price </label>
                    <div class="controls">
                        <input type="text" readonly="true" name="News_price" value="{{$reorder_News->News_price}}"class="span6 " />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">News Qty</label>
                    <div class="controls">
                        <input required="true" min="1" type="number" name="News_qty" class="span2 " />
                        <input  type="hidden" name="News_id" value="{{$reorder_News->id}}" class="span2 " />
                    </div>
                </div>                                
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Re-Order News</button>
                    <a href="{{URL::to('/reorder/')}}" class="btn btn-primary">Cancel</a>
                </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>

@endsection