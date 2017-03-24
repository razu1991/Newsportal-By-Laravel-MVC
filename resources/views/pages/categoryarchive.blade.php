@extends('master')
@section('content')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="left_content">              
                        <ul class="spost_nav">
                            @foreach($category_wise_news as $v_category_wise_news)
                            <li>
                                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="{{asset($v_category_wise_news->news_image)}}"> </a>
                                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title">{{$v_category_wise_news->news_title}}</a> </div>
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