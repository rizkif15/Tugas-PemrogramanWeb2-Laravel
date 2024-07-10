<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index(): View{
        //get post
        $post = Post::latest()->paginate(5);

        //Kirim data post ke view
        return view('posts.index',compact('post'));
    }

    public function show($code){
        $post = Post::findOrFail($code);
        return view('posts.show', compact('post'));
    }

    public function edit($code){
        $post = Post::findOrFail($code);
        return view('posts.edit', compact('post'));
    }


    public function login(){
        return view('posts.login');
    }

    public function add(){
        return view('posts.add');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'required|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
        ]);

        $post = new Post();
        $post->nama_barang = $validate['nama_barang'];
        $post->jumlah = $validate['jumlah'];
        
        if (array_key_exists('keterangan', $validate)){
            $post->keterangan = $validate['keterangan']->store('images', 'public');
        }

        $post->save();

        return redirect()->route('posts.index')->with('success'. 'Post created successfully');

    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
        ]);

        $post = Post::findOrFail($id);
        $post->nama_barang = $validate['nama_barang'];
        $post->jumlah = $validate['jumlah'];

        if ($request->hasFile('keterangan')){
            //Delete the old image
            if ($post->keterangan){
                //menggunakan storage facade
                Storage::delete('public/' . $post->keterangan);

                //alternatif dengan file facade
                //file::delete(storage_path('app/public/' . $post->image));
            }
            $post->keterangan = $request->file('keterangan')->store('images', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id){

        $post = Post::findOrFail($id);

        if ($post->keterangan){
            Storage::disk('public')->delete($post->keterangan);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');

    }
}
