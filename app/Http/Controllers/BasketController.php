<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $card = session()->get('card', []);

        // Əgər məhsul artıq səbətdə varsa, sayını artır
        if (isset($card[$id])) {
            $card[$id]['quantity'] += $request->input('quantity', 1);
        } else {
            // Yoxdursa, yeni məhsul kimi əlavə et
            $card[$id] = [
                "title" => $product->title,
                "quantity" => $request->input('quantity', 1),
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('card', $card);

        return response()->json([
            'status' => 'success',
            'card_count' => count($card)
        ]);
    }

    public function updateShipping(Request $request)
    {
        // AJAX ilə göndərdiyimiz 'method' və 'price' dəyərlərini alıb sessiyaya yazırıq
        session()->put('shipping', [
            'method' => $request->input('method'),
            'price' => (float) $request->input('price')
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Çatdırılma məlumatı sessiyaya uğurla yazıldı.'
        ]);
    }

    public function index()
    {
        $card = session()->get('card', []);
        return view('basket.index', compact('card'));
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $card = session()->get('card');

            // Sessiyada həmin məhsulun sayını yeniləyirik
            $card[$request->id]["quantity"] = $request->quantity;
            session()->put('card', $card);

            // Yeni ümumi məbləği hesablayırıq
            $total = 0;
            foreach ($card as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            return response()->json([
                'status' => 'success',
                'subtotal' => ($card[$request->id]['price'] * $card[$request->id]['quantity']) . ' ₼',
                'grand_total' => $total . ' ₼',
                'count' => count($card)
            ]);
        }
    }

    public function remove(Request $request, $id)
    {
        $card = session()->get('card');

        if (isset($card[$id])) {
            unset($card[$id]); // Məhsulu sessiyadan silirik
            session()->put('card', $card);
        }

        $total = 0;
        foreach ($card as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'status' => 'success',
            'grand_total' => $total . ' ₼',
            'count' => count($card)
        ]);
    }
}
