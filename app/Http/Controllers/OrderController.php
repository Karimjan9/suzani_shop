<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^(?:\+?998[\s\-()]*)?\d{2}[\s\-()]*\d{3}[\s\-()]*\d{2}[\s\-()]*\d{2}$/'],
            'telegram' => ['nullable', 'string', 'max:120'],
            'instagram' => ['nullable', 'string', 'max:120'],
            'address' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.id' => ['required', 'string', 'max:160'],
            'items.*.title' => ['required', 'string', 'max:160'],
            'items.*.category_label' => ['nullable', 'string', 'max:120'],
            'items.*.short_description' => ['nullable', 'string', 'max:255'],
            'items.*.full_description' => ['nullable', 'string', 'max:2000'],
            'items.*.material' => ['nullable', 'string', 'max:160'],
            'items.*.size' => ['nullable', 'string', 'max:120'],
            'items.*.color' => ['nullable', 'string', 'max:120'],
            'items.*.availability' => ['nullable', 'string', 'max:120'],
            'items.*.lead_time' => ['nullable', 'string', 'max:120'],
            'items.*.image_label' => ['nullable', 'string', 'max:120'],
            'items.*.images' => ['nullable', 'array'],
            'items.*.images.*' => ['string', 'max:120'],
            'items.*.price' => ['required', 'integer', 'min:0', 'max:1000000000'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $validated['phone'] = $this->normalizeUzbekPhone($validated['phone']);

        $totals = collect($validated['items'])->reduce(
            function (array $carry, array $item): array {
                $quantity = (int) $item['quantity'];
                $price = (int) $item['price'];

                $carry['total_items'] += $quantity;
                $carry['total_amount'] += ($quantity * $price);

                return $carry;
            },
            ['total_items' => 0, 'total_amount' => 0],
        );

        $order = DB::transaction(function () use ($validated, $totals) {
            $customer = Customer::query()->updateOrCreate(
                ['phone' => $validated['phone']],
                [
                    'name' => $validated['customer_name'],
                    'telegram' => $validated['telegram'] ?? null,
                    'instagram' => $validated['instagram'] ?? null,
                ],
            );

            $order = Order::create([
                'customer_id' => $customer->id,
                'order_number' => $this->generateOrderNumber(),
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'telegram' => $validated['telegram'] ?? null,
                'instagram' => $validated['instagram'] ?? null,
                'address' => $validated['address'] ?? null,
                'notes' => $validated['notes'] ?? null,
                'status' => Order::STATUS_NEW,
                'total_items' => $totals['total_items'],
                'total_amount' => $totals['total_amount'],
            ]);

            foreach ($validated['items'] as $item) {
                $quantity = (int) $item['quantity'];
                $price = (int) $item['price'];

                $order->items()->create([
                    'product_id' => $item['id'],
                    'product_title' => $item['title'],
                    'category_label' => $item['category_label'] ?? null,
                    'image_label' => $item['image_label'] ?? null,
                    'short_description' => $item['short_description'] ?? null,
                    'full_description' => $item['full_description'] ?? null,
                    'material' => $item['material'] ?? null,
                    'size' => $item['size'] ?? null,
                    'color' => $item['color'] ?? null,
                    'availability' => $item['availability'] ?? null,
                    'lead_time' => $item['lead_time'] ?? null,
                    'images' => $item['images'] ?? [],
                    'unit_price' => $price,
                    'quantity' => $quantity,
                    'total_price' => $quantity * $price,
                ]);
            }

            return $order->load('items');
        });

        return response()->json([
            'message' => 'Buyurtmangiz qabul qilindi. Admin tez orada siz bilan bog\'lanadi.',
            'order_number' => $order->order_number,
        ], 201);
    }

    protected function generateOrderNumber(): string
    {
        do {
            $orderNumber = 'SZ-' . now()->format('Ymd') . '-' . Str::upper(Str::random(4));
        } while (Order::query()->where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }

    protected function normalizeUzbekPhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone) ?? '';

        if (strlen($digits) === 9) {
            $digits = '998'.$digits;
        }

        if (! str_starts_with($digits, '998') || strlen($digits) !== 12) {
            throw ValidationException::withMessages([
                'phone' => 'Telefon raqamini 91 310 32 98 ko‘rinishida kiriting.',
            ]);
        }

        return sprintf(
            '+998 %s %s %s %s',
            substr($digits, 3, 2),
            substr($digits, 5, 3),
            substr($digits, 8, 2),
            substr($digits, 10, 2),
        );
    }
}
