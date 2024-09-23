<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ดึงข้อมูลจากทั้ง Home และ Shop
        $homes = Shop::with('reviews')->get();

        // ดึ   งข้อมูลร้านค้าพร้อมกับรีวิวและสุ่มเรียงลำดับ
        $promotions = Shop::with('reviews')->get()->shuffle();

        // ดึงข้อมูลร้านค้าพร้อมกับรีวิวและจัดเรียงตามคะแนน
        $tops = Shop::with('reviews')
        ->get()
        ->sortByDesc(function ($top) {
            return $top->reviews->avg('rating');
        })
        ->take(3);

        $recomments = Shop::with('reviews')
            ->get()
            ->sortByDesc(function ($rec) {
                return $rec->reviews->avg('rating');
            });

        // ส่งข้อมูลไปยัง view
        return view('shop.home', compact('homes', 'promotions', 'tops', 'recomments', 'user'));
    }

    public function shopDetail($id)
    {
        $user = Auth::user();
        $shop = Shop::where('shop_id', $id )->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('user', 'shop'));  // Use compact() as the second argument
    }

    public function booking(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        // Combine date and time into a single Carbon instance
        $bookingDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);

        // Check if there's a booking within the same hour range for the same shop
        $existingBooking = BookingList::where('shop_id', $request->shop_id)
            ->whereDate('date_booking', $request->date)
            ->where(function($query) use ($bookingDateTime) {
                $query->whereTime('time_booking', '>=', $bookingDateTime->subHour()->toTimeString())
                    ->whereTime('time_booking', '<=', $bookingDateTime->addHour()->toTimeString());
            })
            ->get();

        // If there is an existing booking within that hour range
        if ($existingBooking->isNotEmpty()) {
            // Get the latest booking to suggest the next available time
            $nextAvailableTime = null;

            foreach ($existingBooking as $booking) {
                $bookingEndTime = Carbon::parse($booking->time_booking)->addHour();

                // Check if the current request time is within the hour of this booking
                if ($bookingEndTime >= $bookingDateTime) {
                    $nextAvailableTime = Carbon::parse($booking->time_booking)->addHour()->format('H:i');
                    break;
                }
            }

            return redirect()->back()->withErrors(['error' => "การจองที่คุณเลือกถูกจองไปแล้ว โปรดเลือกเวลาใหม่ และทางร้านจะว่างอีกครั้งเวลา $nextAvailableTime."]);
        }

        // Create a new booking record
        BookingList::create([
            'shop_id' => $request->shop_id,
            'user_id' => $user->id,
            'date_booking' => $request->date,
            'time_booking' => $request->time . ':00', // Ensure time format is hh:mm:ss
            'date_transaction' => now()->toDateString(),
            'time_transaction' => Carbon::now('Asia/Bangkok')->toTimeString(),
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Booking confirmed!');
    }

    public function edit($shop_id)
    {
        $user = Auth::user();
        $shop = Shop::where('shop_id', $shop_id)->first();

        return view('shop.EditShopDetails', compact('user', 'shop'));
    }

    public function update(Request $request, $shop_id)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_address' => 'required|string|max:255',
            'shop_description' => 'required|string',
            'images_name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'color_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parts_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pvc' => 'required|string|max:20',
            'clean_nail' => 'required|string|max:20',
        ]);

        $shop = Shop::where('shop_id', $shop_id)->first();


        // อัปเดตค่าต่างๆ
        $shop->shop_name = $request->shop_name;
        $shop->shop_address = $request->shop_address;
        $shop->shop_description = $request->shop_description;
        $shop->pvc = $request->pvc;
        $shop->clean_nail = $request->clean_nail;

        // อัปเดตรูปภาพ
        if ($request->hasFile('images_name')) {
            // Delete the old image if it exists
            if ($shop->images_name) {
                Storage::disk('public')->delete('images/' . $shop->images_name);  // Use the 'public' disk
            }

            // Store the new image in the 'public/images' directory and save the filename in the database
            $file = $request->file('images_name');
            $filename = time() . '_' . $file->getClientOriginalName();  // Create a unique filename
            $file->move(public_path('images'), $filename);  // Move to 'public/images'

            // Update the shop record with the new filename
            $shop->images_name = $filename;
        }

        if ($request->hasFile('color_img')) {
            // Delete the old image if it exists
            if ($shop->color_img) {
                Storage::disk('public')->delete('images/' . $shop->color_img);  // Use the 'public' disk
            }

            // Store the new image in the 'public/images' directory and save the filename in the database
            $file = $request->file('color_img');
            $filename = time() . '_' . $file->getClientOriginalName();  // Create a unique filename
            $file->move(public_path('images'), $filename);  // Move to 'public/images'

            // Update the shop record with the new filename
            $shop->color_img = $filename;
        }

        if ($request->hasFile('parts_img')) {
            // Delete the old image if it exists
            if ($shop->parts_img) {
                Storage::disk('public')->delete('images/' . $shop->parts_img);  // Use the 'public' disk
            }

            // Store the new image in the 'public/images' directory and save the filename in the database
            $file = $request->file('parts_img');
            $filename = time() . '_' . $file->getClientOriginalName();  // Create a unique filename
            $file->move(public_path('images'), $filename);  // Move to 'public/images'

            // Update the shop record with the new filename
            $shop->parts_img = $filename;
        }

         // บันทึกการเปลี่ยนแปลง
         $shop->save();

         // Redirect ไปยังหน้าแสดงรายละเอียดร้าน
         return redirect()->route('editShop', $shop->shop_id)->with('success', 'ข้อมูลร้านค้าได้รับการอัปเดตแล้ว!');

    }

    public function create($user_id)
    {
        // Optional: Validate if the authenticated user matches the user_id
        $user = Auth::user();

        if ($user->id != $user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Initialize an empty Shop instance to avoid undefined variable errors in the view
        $shop = new Shop();

        return view('shop.createShop', compact('user', 'shop'));
    }

    public function store(Request $request, $user_id)
    {
        // Validate the incoming request data
        $request->validate([
            'shop_name' => 'required|string|max:100',
            'shop_address' => 'required|string|max:100',
            'shop_description' => 'required|string',
            'images_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parts_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pvc' => 'required|string|max:255',
            'clean_nail' => 'required|string|max:255',
        ]);


        // Handle file uploads
        $imagePath = null;
        $colorImgPath = null;
        $partsImgPath = null;
        if ($request->hasFile('images_name')) {
            $imagePath = $request->file('images_name')->store('shop_images', 'public');
        }
         if ($request->hasFile('color_img')) {
            $colorImgPath = $request->file('color_img')->store('shop_colors', 'public');
        }
         if ($request->hasFile('parts_img')) {
            $partsImgPath = $request->file('parts_img')->store('shop_parts', 'public');
        }
         // Create the shop
        $shop = Shop::create([
            'user_id' => $user_id,
            'shop_name' => $request->shop_name,
            'shop_address' => $request->shop_address,
            'shop_description' => $request->shop_description,
            'images_name' => $imagePath,
            'color_img' => $colorImgPath,
            'parts_img' => $partsImgPath,
            'pvc' => $request->pvc,
            'clean_nail' => $request->clean_nail,
        ]);
        return redirect()->route('shop.create', ['user_id' => $user_id])->with('success', 'Shop created successfully!');
    }
}
