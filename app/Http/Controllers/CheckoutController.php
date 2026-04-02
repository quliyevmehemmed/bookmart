<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $card = session()->get('card', []);
        $shipping = session()->get('shipping', ['method' => 'Seçilməyib', 'price' => 0]);

        // Subtotal (Məhsulların cəmi)
        $subtotal = 0;
        foreach ($card as $details) {
            $subtotal += $details['price'] * $details['quantity'];
        }

        // Grand Total (Məhsullar + Çatdırılma)
        $total = $subtotal + $shipping['price'];

        // BÜTÜN dəyişənləri burda göndəririk
        return view('basket.checkout', compact('card', 'shipping', 'total'));
    }

    // Sifarişi bazaya yazmaq üçün (Sifariş Ver düyməsi bura gəlir)
    public function store(Request $request)
    {
        // ... validasiya kodların ...

        $card = session()->get('card', []);
        $shipping = session()->get('shipping', ['method' => 'Seçilməyib', 'price' => 0]); // Sessiyadan alırıq

        if (empty($card)) {
            return redirect()->back()->with('error', 'Səbətiniz boşdur!');
        }

        $subtotal = 0;
        foreach ($card as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Ümumi məbləğ = Məhsullar + Çatdırılma
        $totalPrice = $subtotal + $shipping['price'];

        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => auth()->check() ? auth()->id() : null,
            'full_name' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
            'shipping_method' => $shipping['method'], // DÜZƏLİŞ: Sessiyadan gələn metod
            'shipping_price' => $shipping['price'],   // DÜZƏLİŞ: Sessiyadan gələn qiymət
            'payment_method' => 'Nağd',
            'total_price' => $totalPrice,             // DÜZƏLİŞ: Cəmi məbləğ
            'status' => 'pending',
        ]);

        foreach ($card as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id'  => $id,
                'quantity' => $details['quantity'],
                'price'    => $details['price'],
            ]);
        }


        session()->forget(['card', 'shipping']); // Hər ikisini təmizləyirik

        return redirect()->route('home')->with('success', 'Sifarişiniz uğurla tamamlandı!');
    }
}
