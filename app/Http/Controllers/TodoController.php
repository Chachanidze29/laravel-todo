<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller {

    public function index() {
//        $todos = DB::select('select * from todos');
//        $todos = DB::table('todos')->get();
//        $count = $todos->where('completed',0)->count();

        Artisan::call('cache:clear');
        $todos = Cache::rememberForever('todos'.\request('cursor'),function () {
            return DB::table('todos')->where('deleted_at',null)->orderBy('id','DESC')->cursorPaginate(10);
        });
        $count = $todos->count();

        return view('todo', ['todos' => $todos,'count'=>$count]);
    }

    public function store(Request $request) {
        Artisan::call('cache:clear');
        $validated = $request->validate([
            'todo' => 'required|min:3'
        ]);

//        DB::insert('insert into todos (id,content,completed) values (:id,:content,:completed)', ['id' => $todoId, 'content' => $validated['todo'], 'completed' => 0]);
//        DB::table('todos')->insert(['content'=>$validated['todo'],'completed'=>0]);

        Todos::create([
            'content'=>$validated['todo'],
            'completed'=>0,
        ]);
        return Redirect::back();
    }

    public function destroy($id) {
        Artisan::call('cache:clear');
//        DB::delete('delete from todos where id=:id', ['id' => $id]);
//        DB::table('todos')->where('id',$id)->delete();
//        Todos::find($id)->delete();
        Todos::destroy($id);
        return Redirect::back();
    }

    public function changeStatus($id) {
        Artisan::call('cache:clear');
//        DB::update('update todos set completed=1 where id=:id', ['id' => $id]);
//        DB::table('todos')->where('id',$id)->update(['completed'=>1]);
        $todo = Todos::find($id);
        $todo->completed = !$todo->completed;
        $todo->completed_at = now();
        $todo->save();
        return Redirect::back();
    }

    public function getCompletedTodos() {
        Artisan::call('cache:clear');
//        $todos = DB::select('select * from todos where completed=1');
//        $todos = DB::table('todos')->where('completed',1)->get();
        $todos = Cache::rememberForever('todos'.\request('cursor'),function () {
            return DB::table('todos')->where('deleted_at',null)->where('completed',1)->orderBy('id','DESC')->cursorPaginate(10);
        });
        $count = $todos->count();
        return view('todo', ['todos' => $todos,'count'=>$count]);
    }

    public function getUncompletedTodos() {
        Artisan::call('cache:clear');
//        $todos = DB::select('select * from todos where completed=0');
//        $todos = DB::table('todos')->where('completed',0)->get();
        $todos = Cache::rememberForever('todos'.\request('cursor'),function () {
            return DB::table('todos')->where('deleted_at',null)->where('completed',0)->orderBy('id','DESC')->cursorPaginate(10);
        });
        $count = $todos->count();
        return view('todo', ['todos' => $todos,'count'=>$count]);
    }

    public function clearList() {
        Artisan::call('cache:clear');
//        DB::delete('delete from todos');
//        DB::table('todos')->delete();
        Todos::truncate();
        $todos = Cache::rememberForever('todos'.\request('cursor'),function () {
            return DB::table('todos')->where('deleted_at',null)->orderBy('id','DESC')->cursorPaginate(10);
        });
        $count = $todos->count();
        return view('todo', ['todos' => $todos,'count'=>$count]);
    }
}
