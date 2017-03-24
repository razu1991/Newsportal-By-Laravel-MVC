<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\News;
use App\Tag;
use App\Comment;
use Session;

class FrontController extends Controller {

    //
    public function Index() {
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();
        $latest_news = News::orderBy('id', 'desc')
                        ->Where('publication_status', 1)
                        ->take(5)->get();
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $frontview_category = Category::with('newses')
                ->where('publication_status', 1)
                ->where('frontview_category', 1)
                ->orderBy('id', 'DESC')
                ->get();
        $mid_content_category = Category::with('newses')
                ->where('publication_status', 1)
                ->where('menubar_category', 0)
                ->where('header_category', 0)
                ->get();
        $mid_footer_content = Category::with('newses')
                ->Where('id', 5)
                ->get();
        $all_category = Category::all();
        $popular_news = News::Where('hit_count', '>', 0)
                ->get();
        $all_tags = Tag::all();
        Session::put('slide', NULL);
        return view('pages.index')
                        ->with('category_info', $category_info)
                        ->with('latest_news', $latest_news)
                        ->with('breaking_news', $breaking_news)
                        ->with('frontview_category', $frontview_category)
                        ->with('mid_content_category', $mid_content_category)
                        ->with('mid_footer_content', $mid_footer_content)
                        ->with('popular_news', $popular_news)
                        ->with('all_category', $all_category)
                        ->with('all_tags', $all_tags)
                        ->with('header_category', $header_category);
    }

    public function contact() {
        Session::put('slide', 'abcd');
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();
        $latest_news = News::orderBy('id', 'desc')
                        ->Where('publication_status', 1)
                        ->take(5)->get();
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $all_tags = Tag::all();
        return view('pages.contact')
                        ->with('category_info', $category_info)
                        ->with('latest_news', $latest_news)
                        ->with('breaking_news', $breaking_news)
                        ->with('all_tags', $all_tags)
                        ->with('header_category', $header_category);
    }

    public function singlepage($id) {

        Session::put('slide', 'abcd');
        News::Where('id', $id)
                ->increment('hit_count', 1);
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();
        $latest_news = News::orderBy('id', 'desc')
                        ->Where('publication_status', 1)
                        ->take(5)->get();
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $all_tags = Tag::all();
        $single_page = News::where('id', $id)
                ->first();
        $related_cat_id = $single_page->category_id;
        $news_id = $single_page->id;
        $related_news = News::Where('category_id', $related_cat_id)
                ->Where('id', '<>', $news_id)
                ->get();
        $popular_news = News::Where('hit_count', '>', 0)
                ->get();
        $all_category = Category::all();
        return view('pages.singlepage')
                        ->with('category_info', $category_info)
                        ->with('latest_news', $latest_news)
                        ->with('breaking_news', $breaking_news)
                        ->with('all_tags', $all_tags)
                        ->with('header_category', $header_category)
                        ->with('single_page', $single_page)
                        ->with('related_news', $related_news)
                        ->with('popular_news', $popular_news)
                        ->with('all_category', $all_category);
    }

    public function singlecategory($id) {
        Session::put('slide', 'abcd');
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();
        $latest_news = News::orderBy('id', 'desc')
                        ->Where('publication_status', 1)
                        ->take(5)->get();
        $all_tags = Tag::all();

        $category_wise_latest_news = News::Where('category_id', $id)
                ->take(1)
                ->orderBy('news_post_date_time', 'DESC')
                ->get();
        $category_wise_news = News::Where('category_id', $id)
                ->get();
        return view('pages.singlecategory')
                        ->with('category_info', $category_info)
                        ->with('header_category', $header_category)
                        ->with('latest_news', $latest_news)
                        ->with('all_tags', $all_tags)
                        ->with('breaking_news', $breaking_news)
                        ->with('category_wise_news', $category_wise_news)
                        ->with('category_wise_latest_news', $category_wise_latest_news);
    }

    public function singletag($id) {
        Session::put('slide', 'abcd');
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $all_tags = Tag::all();
        $tag_wise_latest_news = News::Where('tag_id', $id)
                ->take(1)
                ->orderBy('id', 'DESC')
                ->get();
        $tag_name = Tag::Where('id', $id)
                ->get();

        $tag_wise_news = News::Where('tag_id', $id)
                ->get();
        return view('pages.singletag')
                        ->with('category_info', $category_info)
                        ->with('header_category', $header_category)
                        ->with('all_tags', $all_tags)
                        ->with('tag_name', $tag_name)
                        ->with('tag_wise_news', $tag_wise_news)
                        ->with('tag_wise_latest_news', $tag_wise_latest_news);
    }

    public function headcategory() {
        Session::put('slide', 'abcd');
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();

        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();

        $all_tags = Tag::all();
        return view('pages.about')
                        ->with('category_info', $category_info)
                        ->with('breaking_news', $breaking_news)
                        ->with('all_tags', $all_tags)
                        ->with('header_category', $header_category);
    }

    public function saveComment(Request $request) {
        $data = array();
        $data['comments_description'] = $request->comment_description;
        $data['news_id'] = $request->news_id;
        $data['user_id'] = $request->user_id;
        Comment::Create($data);
        Session::flash('comment', 'Your comment Published !');
        return back();
    }

    public function categoryarchive($id) {
        Session::put('slide', 'abcd');
        $category_info = Category::Where('publication_status', 1)
                ->Where('menubar_category', 1)
                ->get();
        $header_category = Category::Where('publication_status', 1)
                ->Where('header_category', 1)
                ->get();
        $breaking_news = News::Where('breaking_news', 1)
                ->Where('publication_status', 1)
                ->get();
        $latest_news = News::orderBy('id', 'desc')
                        ->Where('publication_status', 1)
                        ->take(5)->get();
        $all_tags = Tag::all();
        $category_wise_news = News::Where('category_id', $id)
                ->orderBy('news_post_date_time', 'DESC')
                ->get();
        return view('pages.categoryarchive')
                        ->with('category_info', $category_info)
                        ->with('header_category', $header_category)
                        ->with('latest_news', $latest_news)
                        ->with('all_tags', $all_tags)
                        ->with('breaking_news', $breaking_news)
                        ->with('category_wise_news', $category_wise_news);
    }

}
