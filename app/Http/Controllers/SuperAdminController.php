<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\News;
use App\Comment;

class SuperAdminController extends Controller {

    public function Index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        //$dashboard=view('admin.pages.dashboard');
        return view('admin.pages.dashboard'); //->with('admin_maincontent',$dashboard);
    }

    public function addCategory() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        return view('admin.pages.add_category_form');
    }

    public function saveCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['menubar_category'] = $request->menubar_category;
        $data['header_category'] = $request->header_category;
        $data['frontview_category'] = $request->frontview_category;
        $data['publication_status'] = $request->publication_status;

        DB::table('category')->insert($data);
        session::put('message', 'Save Category Sucessfully');
        return Redirect::to('/add-category');
    }

    public function manageCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->select("*")
                ->get();

        return view('admin.pages.manage_category')->with('all_category', $all_category);
    }

    public function unpublishCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return redirect::to('manage-category');
    }

    public function publishCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_category = DB::table('category')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');
    }

    public function editCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $category_info = DB::table('category')
                ->select("*")
                ->where('id', $id)
                ->first();
//     $update_category = view('admin.pages.update_category')->with('category_info', $category_info);
//     return view('admin.admin_master')
//                     ->with('admin_maincontent', $update_category);
        return view('admin.pages.update_category')->with('category_info', $category_info);
    }

    public function updateCategory(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $data = array();
        $id = $request->id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        DB::table('category')
                ->where('id', $id)
                ->update($data);
        return Redirect::to('manage-category');
    }

    public function deleteCategory($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        DB::table('category')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-category');
    }

    public function logout() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        Session::put('admin_id', NULL);
        Session::put('admin_name', NULL);
        Session::put('message', 'You Are Sucessfuly Logout');
        return Redirect::to('/razu');
    }

#####################################################

    public function addTag() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }
        return view('admin.pages.add_tags');
    }

    public function saveTag(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }
        $data = array();
        $data['tag_name'] = $request->tag_name;

        DB::table('tags')->insert($data);
        session::put('message', 'Save tag Sucessfully');
        return Redirect::to('/add-tag');
    }

    public function editTag($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $tag_info = DB::table('tags')
                ->select("*")
                ->where('id', $id)
                ->first();
//     $update_category = view('admin.pages.update_category')->with('category_info', $category_info);
//     return view('admin.admin_master')
//                     ->with('admin_maincontent', $update_category);
        return view('admin.pages.update_tags')->with('tag_info', $tag_info);
    }

    public function manageTag(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_tag = DB::table('tags')
                ->select("*")
                ->get();

        return view('admin.pages.manage_tags')->with('all_tag', $all_tag);
    }

    public function updateTag(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }
        $data = array();
        $id = $request->id;
        $data['tag_name'] = $request->tag_name;
        DB::table('tags')
                ->where('id', $id)
                ->update($data);
        return Redirect::to('manage-tag');
    }

    public function deleteTag($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        DB::table('tags')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-tag');
    }

    ###########################################################

    public function addNews() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $add_News = view('admin.pages.add_News');
        return view('admin.admin_master')
                        ->with('admin_subcontent', $add_News);
    }

    public function saveNews(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        //Image File validation here............
        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'File Type is not Valid.please try new one';
                exit();
            } else {
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'News_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }
            if ($success) {
                $data = array();
                $data['News_title'] = $request->News_title;
                $data['News_summery'] = $request->News_summery;
                $data['full_News'] = $request->full_News;
                $data['category_id'] = $request->category_id;
                $data['tag_id'] = $request->tag_id;
                $data['author_name'] = Session::get('admin_name');
                $data['news_image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                $data['breaking_News'] = $request->breaking_News;
                $data['featured_News'] = $request->featured_News;
                News::Create($data);
                Session::put('message', 'Save News Information Successfully !');
                return Redirect::to('add-News');
            }
        }
    }

    public function manageNews(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_manage_News = DB::table('News')
                ->select("*")
                ->get();
        return view('admin.pages.manage_News')->with('all_manage_News', $all_manage_News);
    }

    public function unpublishNews($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_News = DB::table('News')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return Redirect::to('/manage-News');
    }

    public function publishNews($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_News = DB::table('News')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/manage-News');
    }

    public function searchNews(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $search_text = $request->search_text;
        $all_manage_News = DB::table('News')
                ->select("*")
                ->where('News_title', 'like', "%$search_text%")
                ->get();

        $manage_News = view('admin.pages.manage_News')->with('all_manage_News', $all_manage_News);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $manage_News);
    }

    public function deleteNews($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        DB::table('News')
                ->where('id', $id)
                ->delete();
        return Redirect::to('/manage-News');
    }

    public function editNews($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $News_info = DB::table('News')
                ->select("*")
                ->where('id', $id)
                ->get();
        $edit_News = view('admin.pages.edit_News')->with('News_info', $News_info);
        return view('admin.admin_master')
                        ->with('admin_maincontent', $edit_News);
    }

    ##News info update method here----------------------------------------------------------

    public function updateNews(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $image = $request->file('image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
                echo 'Image extension Must be JPG Or PNG Format';
                exit();
            } else {

                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'News_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);
            }

            if ($success) {
                $data = array();
                $id = $request->id;
                $data['News_title'] = $request->News_title;
                $data['News_summery'] = $request->News_summery;
                $data['full_News'] = $request->full_News;
                $data['category_id'] = $request->category_id;
                $data['tag_id'] = $request->tag_id;
                $data['author_name'] = Session::get('admin_name');
                $data['news_image'] = $image_url;
                $data['publication_status'] = $request->publication_status;
                $data['breaking_News'] = $request->breaking_News;
                $data['featured_News'] = $request->featured_News;

                News::Where('id', $id)
                        ->update($data);

                Session::put('message', 'Update News Information Successfully !');
                return Redirect::to('manage-News');
            }
        } else {
            $data = array();
            $id = $request->id;
            $data['News_title'] = $request->News_title;
            $data['News_summery'] = $request->News_summery;
            $data['full_News'] = $request->full_News;
            $data['category_id'] = $request->category_id;
            $data['author_name'] = Session::get('admin_name');

            $data['publication_status'] = $request->publication_status;
            $data['breaking_News'] = $request->breaking_News;
            $data['featured_News'] = $request->featured_News;

            News::Where('id', $id)
                    ->update($data);

            Session::put('message', 'Update News Information Successfully !');
            return Redirect::to('manage-News');
        }
    }

    public function user_comments() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $all_comments = Comment::All();

        return view('admin.pages.manage_Comments')->with('all_comments', $all_comments);
    }

    public function unpublishComment($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        Comment::where('comment_id', $id)
                ->update(['publication_status' => 0]);
        return Redirect::to('/comments');
    }

    public function publishComment($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        Comment::where('comment_id', $id)
                ->update(['publication_status' => 1]);
        return Redirect::to('/comments');
    }

    public function deleteComment($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        Comment::where('comment_id', $id)
                ->delete();
        return Redirect::to('/comments');
    }

    public function editComment($id) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

//        $Comment_info =Comment::findOrFail('comment_id',$id);
        $Comment_info = DB::table('Comments')
                ->select("*")
                ->where('comment_id', $id)
                ->get();
        return view('admin.pages.edit_comment')
                        ->with('Comment_info', $Comment_info);
    }

    public function updateComment(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/razu')->send();
        }

        $data = array();
        $id = $request->comment_id;
        $data['comments_description'] = $request->comments_description;
        $data['publication_status'] = $request->publication_status;
        $data['deletion_status'] = $request->deletion_status;
        $delete = $request->deletion_status;
        if ($delete == 1) {
            Comment::where('comment_id', $id)
                    ->delete();
        } else {
            Comment::where('comment_id', $id)
                    ->update($data);
        }

        return Redirect::to('comments');
    }

}
