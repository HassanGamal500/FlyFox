<?php 

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostControllerR extends Controller
{

    public function index()
    {
        $user = Auth::id();

        $posts = Post::where('user_id', $user)->paginate(20);

        return view('posts_user.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];
        $messages = [
            'title.requested' => 'Patient Name Is Required',
            'body.requested' => 'The Content Is Required',
        ];

        $this->validate($request, $rules, $messages);

        $user = Auth::id();
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $user;
        $post->save();

        flash()->message('Created Successfully');

        return back();

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Post::findOrFail($id);
        return view('posts_user.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);

        $update = $post->update($request->all());

        flash()->success('Updated Successfully');

        return back();
    }

    public function destroy($id)
    {
        $record = Post::findOrFail($id);

        $record->delete();

        flash()->success('Deleted Successfully');

        return back();
    }
  
}

?>