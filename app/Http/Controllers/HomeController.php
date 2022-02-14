<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function cons_Tags()
    {
        //probar metodos de filtrat 
        $userId = Auth::id();
        $tags = Tag::where('userId',$userId)->get();
        return $tags;
    }
    public function crear_Tag(Request $request){
        $userId = Auth::id();
        // $fecha = new DateTime();

        $data= request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'enlace' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string'],
            'imagen' => [],
            'posicion' => ['int'],
            
        ]);
        return Tag::create([

            'userId'=> $userId,
            'name' => $data['name'],
            'enlace' => $data['enlace'],
            'categoria' => $data['categoria'],
            'posicion' => $data['posicion'],
            'imagen'=> $data['imagen'],
            
        ]);
    }
    public function editar_Tag(Request $request, Tag $id){
        $userId = Auth::id();
        // $fecha = new DateTime();

        $data= $request()->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'enlace' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string'],
            'imagen' => [],
            'posicion' => ['int'],
            
        ]);
        $id->update([
            'name' => $data['name'],
            'enlace' => $data['enlace'],
            'categoria' => $data['categoria'],
            'imagen' => $data['imagen'],
            'posicion' => $data['posicion'],
        ]);
      

    }
    public function eliminar_Tag($id){
        
        //Tag::where('id',$id)->get()->remove();
        $sergio=Tag::find($id);
        $sergio->delete();
    }
}
