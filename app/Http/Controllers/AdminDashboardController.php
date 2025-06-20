<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Promo;
use App\Models\Message;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $unreadCount = Message::where('is_read', false)->count();

        return view('admin.dashboard', [
            'bannerCount' => Banner::count(),
            'promoCount' => Promo::count(),
            'messageCount' => Message::count(),
            'latestMessages' => Message::latest()->take(5)->get(),
            'messages' => Message::latest()->get(),
            'unreadCount' => $unreadCount,
        ]);
    }

    public function uploadBanner(Request $request)
    {
        $request->validate([
            'banner1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'banner2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'banner3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        foreach (['banner1', 'banner2', 'banner3'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('banners', 'public');
                Banner::create(['image_path' => $path]);
            }
        }

        return redirect()->back()->with('success', 'Banner berhasil diupload.');
    }

    public function uploadPromo(Request $request)
    {
        $request->validate([
            'promo1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'promo2' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'promo3' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        foreach (['promo1', 'promo2', 'promo3'] as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('promos', 'public');
                Promo::create(['image_path' => $path]);
            }
        }

        return redirect()->back()->with('success', 'Promosi berhasil diupload.');
    }

    public function markMessagesAsRead()
    {
        Message::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['status' => 'success']);
    }
}
