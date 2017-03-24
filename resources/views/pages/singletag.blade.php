@extends('master')
@section('content')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="left_content">
                <div class="single_post_content">
                    @foreach($tag_name as $v_tag_name)
                    <h2><span>{{$v_tag_name->tag_name}}</span></h2>
                    @endforeach
                    @foreach($tag_wise_latest_news as $v_tag_wise_latest_news)

                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="{{asset($v_tag_wise_latest_news->news_image)}}"> <span class="overlay"></span> </a>
                                    <figcaption> <a href="pages/single_page.html">{{$v_tag_wise_latest_news->news_title}}</a> </figcaption>
                                    <p>{{$v_tag_wise_latest_news->news_summery}}</p>
                                </figure>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_post_content_right">
                        <ul class="spost_nav">
                            @foreach($tag_wise_news as $v_tag_wise_news)
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{asset($v_tag_wise_news->news_image)}}"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title">{{$v_tag_wise_news->news_title}}</a> </div>
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