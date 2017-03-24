@extends('master')
@section('content')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                @foreach($frontview_category as $v_frontview_category)
                <div class="single_post_content">
                    <h2><span>{{$v_frontview_category->category_name}}</span></h2>
                    <div class="single_post_content_left">
                        <ul class="business_catgnav  wow fadeInDown">                          
                            <?php
                            $category_id = $v_frontview_category->id;
                            $v_front_news = App\News::Where('category_id', $category_id)->orderBy('news_post_date_time', 'DESC')->take(1)->first();
                            if ($v_front_news) {
                                ?>                          
                                <li>
                                    <figure class="bsbig_fig"> <a href="{{URL::to('single-page/'.$v_front_news->id)}}" class="featured_img"> <img alt="" src="{{asset($v_front_news->news_image)}}"> <span class="overlay"></span> </a>
                                        <figcaption> <a href="{{URL::to('single-page/'.$v_front_news->id)}}">{{$v_front_news->news_title}}</a> </figcaption>
                                        <p>{{$v_front_news->news_summery}}</p>
                                    </figure>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="single_post_content_right">
                        <ul class="spost_nav">
                            <?php
                            $category_id = $v_frontview_category->id;
                            $left_news = App\News::Where('category_id', $category_id)->take(4)->orderBy('news_post_date_time')->get();
                            foreach ($left_news as $v_latest_news) {
                                ?>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_latest_news->id)}}" class="media-left"> <img alt="" src="{{asset($v_latest_news->news_image)}}"> </a>
                                        <div class="media-body"> <a href="{{URL::to('single-page/'.$v_latest_news->id)}}" class="catg_title"> {{$v_latest_news->news_title}}</a> </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="fashion_technology_area">
                    @foreach($mid_content_category as $v_mid_content_category)
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>{{$v_mid_content_category->category_name}}</span></h2>
                            <ul class="business_catgnav wow fadeInDown">
                                <?php
                                $category_id = $v_mid_content_category->id;
                                $mid_front_news = App\News::Where('category_id', $category_id)->take(1)->orderBy('news_post_date_time')->get();
                                foreach ($mid_front_news as $v_mid_front_news) {
                                    ?>
                                    <li>
                                        <figure class="bsbig_fig"> <a href="{{URL::to('single-page/'.$v_mid_front_news->id)}}" class="featured_img"> <img alt="" src="{{asset($v_mid_front_news->news_image)}}"> <span class="overlay"></span> </a>
                                            <figcaption> <a href="{{URL::to('single-page/'.$v_mid_front_news->id)}}">{{$v_mid_front_news->news_title}}</a> </figcaption>
                                            <p>{{$v_mid_front_news->news_summery}}</p>
                                        </figure>
                                    </li>
                                <?php } ?>
                            </ul>
                            <ul class="spost_nav">
                                <?php
                                $category_id = $v_mid_content_category->id;
                                $mid_front_news = App\News::Where('category_id', $category_id)->take(5)->orderBy('news_post_date_time', 'DESC')->get();
                                foreach ($mid_front_news as $v_mid_front_news) {
                                    ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_mid_front_news->id)}}" class="media-left"> <img alt="" src="{{asset($v_mid_front_news->news_image)}}"> </a>
                                            <div class="media-body"> <a href="{{URL::to('single-page/'.$v_mid_front_news->id)}}" class="catg_title">{{$v_mid_front_news->news_title}}</a> </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div> 
                    @endforeach
                </div>                
                <div class="single_post_content">
                    @foreach($mid_footer_content as $v_mid_footer_content)
                    <h2><span>{{$v_mid_footer_content->category_name}}</span></h2>
                    <div class="single_post_content_left">
                        <ul class="business_catgnav">
                            <?php
                            $category_id = $v_mid_footer_content->id;
                            $mid_footer_content = App\News::Where('category_id', $category_id)->take(1)->orderBy('news_post_date_time')->get();
                            foreach ($mid_footer_content as $v_footer_content) {
                                ?>
                                <li>
                                    <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="{{URL::to('single-page/'.$v_footer_content->id)}}"> <img src="{{asset($v_footer_content->news_image)}}" alt=""> <span class="overlay"></span> </a>
                                        <figcaption> <a href="{{URL::to('single-page/'.$v_footer_content->id)}}">{{$v_footer_content->news_title}}</a> </figcaption>
                                        <p>{{$v_footer_content->news_summery}}</p>
                                    </figure>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    @endforeach
                    <div class="single_post_content_right">
                        <ul class="spost_nav">     
                            <?php
                            $category_id = $v_mid_footer_content->id;
                            $mid_footer_content_sm = App\News::Where('category_id', $category_id)->take(5)->orderBy('news_post_date_time', 'DESC')->get();
                            foreach ($mid_footer_content_sm as $v_footer_content) {
                                ?>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_footer_content->id)}}" class="media-left"> <img alt="" src="{{asset($v_footer_content->news_image)}}"> </a>
                                        <div class="media-body"> <a href="{{URL::to('single-page/'.$v_footer_content->id)}}" class="catg_title"> {{$v_footer_content->news_title}}</a> </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Popular News</span></h2>
                    <ul class="spost_nav">  
                        @foreach($popular_news as $v_popular_news)
                        <li>
                            <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_popular_news->id)}}" class="media-left"> <img alt="" src="{{asset($v_popular_news->news_image)}}"> </a>
                                <div class="media-body"> <a href="{{URL::to('single-page/'.$v_popular_news->id)}}" class="catg_title">{{$v_popular_news->news_title}}</a> </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="single_sidebar">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                        <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                        <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Tags</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="category">
                            <ul>
                                @foreach($all_category as $v_all_category)
                                <li class="cat-item"><a href="{{URL::to('single-category/'.$v_all_category->id)}}">{{$v_all_category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="video">
                            <div class="vide_area">
                                <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <ul class="spost_nav">
                                @foreach($all_tags as $v_tags)
                                <li class="cat-item"><a href="{{('single-tag/'.$v_tags->id)}}">{{$v_tags->tag_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Sponsor</span></h2>
                    <a class="sideAdd" href="#"><img src="images/add_img2.png" alt=""></a> </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Category Archive</span></h2>
                    <select class="catgArchive" id="category_id" onchange="copy_data(this.form)">
                        <option>Select Category</option>
                        @foreach($all_category as $v_all_category)
                        <option>{{$v_all_category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Links</span></h2>
                    <ul>             
                        <li><a href="{{URL::to('login')}}">Login</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
<script>

</script>
@endsection