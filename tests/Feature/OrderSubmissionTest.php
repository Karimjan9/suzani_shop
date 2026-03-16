<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_submit_a_multi_item_order(): void
    {
        $response = $this->postJson(route('orders.store'), [
            'customer_name' => 'Ali Valiyev',
            'phone' => '+998901112233',
            'telegram' => '@ali',
            'instagram' => '@ali.shop',
            'address' => 'Toshkent shahri',
            'notes' => 'Rangni biroz to\'qroq qilish mumkin bo\'lsa yaxshi bo\'ladi.',
            'items' => [
                [
                    'id' => 'anor-suzani',
                    'title' => 'Anor Suzani',
                    'price' => 1250000,
                    'quantity' => 1,
                    'category_label' => 'Devor uchun suzani',
                    'short_description' => 'Qo\'lda tikilgan premium suzani.',
                    'full_description' => 'Katta devor kompozitsiyasi uchun mo\'ljallangan suzani.',
                    'material' => 'Paxta va ipak ip',
                    'size' => '220 x 160 sm',
                    'color' => 'Anor qizil',
                    'availability' => 'Buyurtma asosida mavjud',
                    'lead_time' => '5-7 ish kuni',
                    'image_label' => 'Asosiy rasm',
                    'images' => ['Asosiy rasm', 'Naqsh detali'],
                ],
                [
                    'id' => 'baxmal-yostiq',
                    'title' => 'Baxmal Yostiq',
                    'price' => 320000,
                    'quantity' => 2,
                    'category_label' => 'Yostiq va tekstil',
                    'short_description' => 'Kashtali baxmal yostiq.',
                    'full_description' => 'Divan va yotoqxona uchun yumshoq dekor yostiq.',
                    'material' => 'Baxmal',
                    'size' => '45 x 45 sm',
                    'color' => 'Zumrad yashil',
                    'availability' => 'Omborda bor',
                    'lead_time' => '24 soat',
                    'image_label' => 'Old ko\'rinish',
                    'images' => ['Old ko\'rinish'],
                ],
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure([
                'message',
                'order_number',
            ]);

        $this->assertDatabaseCount('orders', 1);
        $this->assertDatabaseCount('order_items', 2);

        $order = Order::query()->with('items')->firstOrFail();

        $this->assertSame(Order::STATUS_NEW, $order->status);
        $this->assertSame(3, $order->total_items);
        $this->assertSame(1890000, (int) $order->total_amount);
        $this->assertCount(2, $order->items);
    }
}
