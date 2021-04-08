<?php
 
namespace App\Http\Controllers\Admin;  // \Adminを追加
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Delivery;
use App\Item;
use Auth;
 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 
    /**
     * 管理画面のトップページ
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // 各データステータスの件数
        $data = [
            'delivery_not_buy' => Delivery::where('status', '注文依頼')->count(),
            'delivery_delivering' => Delivery::where('status', '配達中')->count(),
            'item_not_buy' => Item::where('status', '注文依頼')->count(),
            'item_bought' => Item::where('status', '注文済み')->count(),
            'item_got' => Item::where('status', '入荷済み')->count(),
            'item_delivering' => Item::where('status', '配達中')->count()
        ];
        
        return view('admin.home', $data);
    }
}