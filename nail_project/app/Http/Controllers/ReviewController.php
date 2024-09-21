<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // ใช้โมเดลสำหรับตารางรีวิว
use Auth;

class ReviewController extends Controller
{
    public function submitReview(Request $request)
{
    $validatedData = $request->validate([
        'booking_list_id' => 'required|integer',
        'shop_id' => 'required|string',
        'rating' => 'required|integer',
        'detail' => 'required|string',
    ]);

    // ดึง user_id จาก Auth
    $userId = Auth::id();

    // ค้นหารีวิวที่มีอยู่สำหรับผู้ใช้, shop_id, และ booking_list_id
    $review = Review::where('user_id', $userId)
                    ->where('shop_id', $validatedData['shop_id'])
                    ->where('booking_list_id', $validatedData['booking_list_id'])
                    ->first();

    if ($review) {
        // อัปเดตเฉพาะ rating และ detail
        $review->rating = $validatedData['rating'];
        $review->detail = $validatedData['detail'];
        $review->save();

        return response()->json(['success' => true, 'message' => 'รีวิวของคุณถูกอัปเดตเรียบร้อยแล้ว!']);
    } else {
        // สร้างรีวิวใหม่
        Review::create([
            'booking_list_id' => $validatedData['booking_list_id'],
            'shop_id' => $validatedData['shop_id'],
            'user_id' => $userId,
            'detail' => $validatedData['detail'],
            'rating' => $validatedData['rating'],
        ]);

        return response()->json(['success' => true, 'message' => 'รีวิวของคุณถูกส่งเรียบร้อยแล้ว!']);
    }
}




}
