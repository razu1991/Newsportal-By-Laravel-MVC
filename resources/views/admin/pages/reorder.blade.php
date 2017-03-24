@extends('admin.admin_master')
@section('admin_maincontent')
<!-- BEGIN ADVANCED TABLE widget-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE widget-->
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Reorder List</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered" id="sample_1">
                    <thead>
                        <tr>
                            <th class="hidden-phone">News name</th>
                            <th class="hidden-phone">Price</th>
                            <th class="hidden-phone">On Hand</th>
                            <th class="hidden-phone">Category</th>
                            <th class="hidden-phone">Manufacturer</th>
                            <th class="hidden-phone">Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reorder_News as $v_reorder_News) { ?>
                            <tr class="odd gradeX">
                                <td>{{$v_reorder_News->News_title}}</td>
                                <td class="hidden-phone">{{$v_reorder_News->News_price}}</td>
                                <td class="center hidden-phone">{{$v_reorder_News->News_qty}}</td>
                                <td class="hidden-phone">
                                    <?php
                                    $cat_id = $v_reorder_News->category_id;
                                    $cat_name = DB::table('category')
                                            ->where('id', $cat_id)
                                            ->first();
                                    echo $cat_name->category_name;
                                    ?>   
                                </td>
                                <td class="hidden-phone">{{$v_reorder_News->manufacturer_name}}</td>
                                <td class="hidden-phone"><a href="{{URL::to('add_old_News/'.$v_reorder_News->id)}}" class="btn btn-primary">Re-Order</a></td>                         
                            </tr>   
<?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
        <!-- END EXAMPLE TABLE widget-->
        @endsection