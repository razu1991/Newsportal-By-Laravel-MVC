@extends('master')
@section('content')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <ol class="breadcrumb">
                        <li><a href="{{URL::to('/')}}">হোম   </a></li>
                        <li><a href="#">{{$single_page->categorys->category_name}}</a></li>
                    </ol>
                    <h1>{{$single_page->news_title}}</h1>
                    <div class="post_commentbox"> <a href="#"></a> <span><i class="fa fa-calendar"></i>{{$single_page->news_post_date_time}}</span> <a href="#"><i class="fa fa-tags"></i>{{$single_page->categorys->category_name}}</a> </div>
                    <div class="single_page_content"> <img class="img-center" src="{{asset($single_page->news_image)}}" alt="">
                        <p>{{$single_page->full_news}}</p>                                         
                    </div>
                    <h3>All Comments.......</h3><hr>
                    @foreach($single_page->comments as $v_comments)
                    <h4>{{$v_comments->comments_description}}</h4><p>{{$v_comments->users->name}}</p><hr>
                    @endforeach
                    @if (Auth::guest()) 
                    <p>Please <a style="color:red;" href="{{URL::to('login')}}">Login</a>/<a style="color:red;" href="{{URL::to('register')}}">Register</a> To Comments</p>
                    @else                    
                    {!! Form::open(array('url' => 'save-comment', 'method' => 'post' )) !!}
                    <input class="form-control" value="{{$single_page->id}}" name="news_id" type="hidden" placeholder="news_id">
                    <input class="form-control" value="{{ Auth::user()->id }}" name="user_id" type="hidden" placeholder="user_id">
                    <textarea class="form-control" cols="10" rows="4" name="comment_description" placeholder=" Add Comments....."></textarea>                   
                    <input type="submit" value="Add Comment">
                    {!! Form::close() !!}
                    @endif
                    @if(Session::has('comment'))
                    <h3 class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('comment') }}</h3>
                    @endif

                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="{{URL::to('https://www.facebook.com/sharer/sharer.php?u=http://raazu.com/eshop/category/'. $single_page->id . '&title=' . $single_page->news_title)}}" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>


                    <div class="related_post">
                        <h2>Related News <i class="fa fa-thumbs-o-up"></i></h2>
                        <ul class="spost_nav wow fadeInDown animated">
                            @foreach($related_news as $v_related_news)
                            <li>
                                <div class="media"> <a class="media-left" href="single_page.html"> <img src="{{asset($v_related_news->news_image)}}" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="single_page.html">{{$v_related_news->news_title}}</a> </div>
                                </div>
                            </li>  
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                <div>
                    <h3>City Lights</h3>
                    <img src="../images/post_img1.jpg" alt=""/> </div>
            </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                <div>
                    <h3>Street Hills</h3>
                    <img src="../images/post_img1.jpg" alt=""/> </div>
            </a> </nav>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Popular News</span></h2>
                    <ul class="spost_nav">
                        @foreach($popular_news as $v_popular_news)
                        <li>
                            <div class="media wow fadeInDown"> <a href="{{URL::to('single-page/'.$v_popular_news->id)}}" class="media-left"> <img alt="" src="{{asset($v_popular_news->news_image)}}"> </a>
                                <div class="media-body"> <a href="{{URL::to('single-page/'.$v_popular_news->id)}}" class="catg_title"> {{$v_popular_news->news_title}}</a> </div>
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
                                @foreach($all_tags as $v_all_tags)
                                <li class="cat-item"><a href="{{URL::to('single-tag/'.$v_all_tags->id)}}">{{$v_all_tags->tag_name}}</a></li>
                                @endforeach                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Sponsor</span></h2>
                    <a class="sideAdd" href="#"><img src="../images/add_img2.png" alt=""></a> </div>
                <div class="single_sidebar wow fadeInDown">
                    <h2><span>Category Archive</span></h2>
                    <select class="catgArchive" >
                        <option>Select....</option>  
                        @foreach($all_category as $v_all_category)             
                        <option onClick="myCategory('<?php echo $v_all_category->id; ?>', 'purchase_total')">{{$v_all_category->category_name}}</option>  
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
@endsection