<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

use App\Repositories\TestRepository;

class TestController extends Controller
{
    /**
     * テストリポジトリ
     * 
     * @var TestRepository
     */
    protected $tests;


    /**
     * コンストラクタ
     * 
     * @return void
     */
    public function __construct(TestRepository $tests)
    {
        $this->middleware('auth');

        $this->tests = $tests;
    }


    /**
     * 会員一覧
     *  
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $tests = Test::orderBy('id', 'asc')->get();
        // $mem1 = $request->user()->tests();
        // dd($mem1);
        // $tests = $request->user()->tests()->orderBy('id', 'desc')->get();
        $tests = $this->tests->forUser($request->user());
        return view('tests.index', compact('tests'));
    }


    /**
     * 会員登録ページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function create()
    {
        $page = "会員登録フォーム：　";
        return view('tests.create', compact('page'));
    }


    /**
     * 会員登録
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        // 会員作成
        // Test::create([
        //     'user_name' => $request->user_name,
        //     'phone_number' => $request->phone_number,
        //     'email' => $request->email
        // ]);
        $request->user()->tests()->create([
            'user_name' => $request->user_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);
        return redirect('/tests');
    }


    /**
     * 編集ページへ遷移(ルートモデル結合)
     * 
     * @param Test $test
     */
    public function edit(Test $test)
    {
        $page = "会員編集フォーム：　";
        // echo 'aaa';
        // exit;
        return view('tests.edit', compact('page', 'test'));
    }

    /**
     * 編集ページへ遷移
     * 
     * @param $id
     */
    // public function edit($id)
    // {
    //     $page = "会員編集フォーム：　";
    //     $test = Test::find($id);
    //     return view('tests.edit', compact('page', 'test'));
    // }


    /**
     * 編集登録(ルートモデル結合)
     * 
     * @param Request $request
     * @param Test $test
     * @return Response
     */
    public function update(Request $request, Test $test)
    {
        $this->validate($request,[
            'user_name' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $test->update([
            "user_name" => $request->user_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);
        return redirect('/tests');
    }

    /**
     * 編集登録
     * 
     * @param Request $request
     * @param $id
     * @return Response
     */
    // public function update(Request $request, $id)
    // {
    //     $test = Test::find($id);
    //     $this->validate($request,[
    //         'user_name' => 'required|max:255',
    //         'phone_number' => 'required|max:255',
    //         'email' => 'required|max:255',
    //     ]);
    //     $test->update([
    //         "user_name" => $request->user_name,
    //         'phone_number' => $request->phone_number,
    //         'email' => $request->email
    //     ]);
    //     return redirect('/tests');
    // }


    /**
     * 登録削除(ルートモデル結合)
     * 
     * @param Request $request
     * @param Test $test
     * @return Response
     */
    public function destroy(Request $request, Test $test)
    {
        $this->authorize('destroy', $test);
        $test->delete();
        return redirect('/tests');
    }

    /**
     * 登録削除
     * 
     * @param Request $request
     * @param $id
     * @return Response
     */
    // public function destroy(Request $request, $id)
    // {
    //     $test = Test::find($id);
    //     $this->authorize('destroy', $test);
    //     $test->delete();
    //     return redirect('/tests');
    // }

}
