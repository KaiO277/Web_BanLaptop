<?php 
namespace App\Helper;
use Illuminate\Support\Facades\DB;
class CartHelper 
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }
    public function add($id, $quantity = 1){
        $products = DB::table('products')->where('prod_id',$id)->first();
        $item = [
            'id' => $products->prod_id,
            'name' => $products->prod_name,
            'price' => $products->prod_price,
            'image' => $products->prod_img,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$id])){
            $this->items[$id]['quantity'] += $quantity;
        }else{
            $this->items[$id] = $item;
        }
        
        // dd($this->items);
        session(['cart' => $this->items]);
        // dd($item);
    }

    public function remove($id)
    {
        if (isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity)
    {
        if (isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }

    public function clear()
    {
        session(['cart' => '']);
    }

    private function get_total_price(){
        $t = 0;
        foreach ($this->items as $item){
            $t += $item['price']* $item['quantity'];
        }
        return $t;
    }

    private function get_total_quantity(){
        $t = 0;
        foreach ($this->items as $item){
            $t +=  $item['quantity'];
        }
        return $t;
    }
    
}
?>