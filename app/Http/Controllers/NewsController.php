<?php

namespace App\Http\Controllers;

use App\Models\News_udpate;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function new_update()
    {
        return view('admin.new_update');
    }

    public function save_news(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ]
        );
        $news = new News_udpate();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save(); // Insert new record in the database 
        return redirect()->route('all_news');
    }

    public function all_news()
    {
        return view('admin.all_news')->with(['news' => News_udpate::all()]); // Fetch all records from the database and send it to the view
    }

    public function update_news($id)
    {
        return view('admin.update_news')->with(['news' => News_udpate::find($id)]);
    }

    public function save_news_update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ]
        );

        $news = News_udpate::find($id);
        if($news)
        {
            $news->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }

        return redirect()->route('all_news');
    }

    // Function to delete the entry from the database
    public function delete_news($id)
    {
        $news = News_udpate::find($id);
        $news->delete(); // Deleting the entry from the database
        return redirect()->route('all_news');
    }
}
