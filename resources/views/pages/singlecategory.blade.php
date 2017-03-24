@extends('master')
@section('content')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="left_content">
                <div class="single_post_content">
                    @foreach($category_wise_latest_news as $v_category_wise_latest_news)
                    <h2><span>{{$v_category_wise_latest_news->categorys->category_name}}</span></h2>
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"> <a href="{{URL::to('single-page/'.$v_category_wise_latest_news->id)}}" class="featured_img"> <img alt="" src="{{asset($v_category_wise_latest_news->news_image)}}"> <span class="overlay"></span> </a>
                                    <figcaption> <a href="{{URL::to('single-page/'.$v_category_wise_latest_news->id)}}">{{$v_category_wise_latest_news->news_title}}</a> </figcaption>
                                    <p>{{$v_category_wise_latest_news->news_summery}}</p>
                                </figure>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_post_content_right">
                        <ul class="spost_nav">
                            @foreach($category_wise_news as $v_category_wise_news)
                            <li>
                                <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_category_wise_news->id)}}" class="media-left"> <img alt="" src="{{asset($v_category_wise_news->news_image)}}"> </a>
                                    <div class="media-body"> <a href="{{URL::to('single-page/'.$v_category_wise_news->id)}}" class="catg_title">{{$v_category_wise_news->news_title}}</a> </div>
                                </div>
                            </li> 
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection