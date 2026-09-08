<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // ===== Order Statistics =====
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $shippedOrders = Order::where('status', 'shipped')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();

        // ===== Revenue Statistics =====
        $totalRevenue = Order::where('status', 'delivered')->sum('total');
        $todayRevenue = Order::where('status', 'delivered')
            ->whereDate('created_at', today())
            ->sum('total');
        $weekRevenue = Order::where('status', 'delivered')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('total');
        $monthRevenue = Order::where('status', 'delivered')
            ->whereMonth('created_at', now()->month)
            ->sum('total');

        // ===== Previous Period Comparison =====
        $lastWeekRevenue = Order::where('status', 'delivered')
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->sum('total');

        $revenueGrowth = $lastWeekRevenue > 0
            ? round((($weekRevenue - $lastWeekRevenue) / $lastWeekRevenue) * 100, 1)
            : ($weekRevenue > 0 ? 100 : 0);

        // ===== User Statistics =====
        $totalUsers = User::count();
        $newUsersThisWeek = User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $newUsersToday = User::whereDate('created_at', today())->count();

        // ===== Product Statistics =====
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $outOfStock = Product::where('stock_quantity', '<=', 0)->count();
        $lowStock = Product::where('stock_quantity', '>', 0)->where('stock_quantity', '<=', 5)->count();

        // ===== Category Statistics =====
        $totalCategories = Category::count();

        // ===== Recent Orders =====
        $recentOrders = Order::with(['user', 'items'])
            ->latest()
            ->limit(10)
            ->get();

        // ===== Top Products =====
        $topProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.sale_price',
                DB::raw('SUM(order_items.quantity) as total_sold'),
                DB::raw('SUM(order_items.line_total) as total_revenue')
            )
            ->groupBy('products.id', 'products.name', 'products.sale_price')
            ->orderBy('total_sold', 'DESC')
            ->limit(5)
            ->get();

        // ===== Daily Orders for Chart (Last 7 Days) =====
        $dailyOrders = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(total) as revenue')
        )
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->keyBy('date');

        // Fill missing dates with zero
        $chartData = [];
        $chartRevenue = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartData[$date] = $dailyOrders->has($date) ? $dailyOrders[$date]->count : 0;
            $chartRevenue[$date] = $dailyOrders->has($date) ? $dailyOrders[$date]->revenue : 0;
        }

        // ===== Order Status Distribution =====
        $statusDistribution = [
            'Pending' => $pendingOrders,
            'Processing' => $processingOrders,
            'Shipped' => $shippedOrders,
            'Delivered' => $deliveredOrders,
            'Cancelled' => $cancelledOrders,
        ];

        // ===== Payment Method Distribution =====
        $paymentMethods = Order::select('payment_method', DB::raw('COUNT(*) as count'))
            ->groupBy('payment_method')
            ->get()
            ->pluck('count', 'payment_method')
            ->toArray();

        // ===== Calculate Growth/Change Percentages =====
        $previousWeekOrders = Order::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        $currentWeekOrders = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $orderGrowth = $previousWeekOrders > 0
            ? round((($currentWeekOrders - $previousWeekOrders) / $previousWeekOrders) * 100, 1)
            : ($currentWeekOrders > 0 ? 100 : 0);

        // ===== Visitor Statistics (if you have a visits table) =====
        // Uncomment if you have a visits table
        // $totalVisitors = Visit::count();
        // $uniqueVisitors = Visit::distinct('visitor_id')->count();
        // For now using placeholder
        $totalVisitors = 0;
        $uniqueVisitors = 0;
        $bounceRate = 0;

        return view('admin.index', compact(
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'shippedOrders',
            'deliveredOrders',
            'cancelledOrders',
            'totalRevenue',
            'todayRevenue',
            'weekRevenue',
            'monthRevenue',
            'revenueGrowth',
            'totalUsers',
            'newUsersThisWeek',
            'newUsersToday',
            'totalProducts',
            'activeProducts',
            'outOfStock',
            'lowStock',
            'totalCategories',
            'recentOrders',
            'topProducts',
            'chartData',
            'chartRevenue',
            'statusDistribution',
            'paymentMethods',
            'orderGrowth',
            'totalVisitors',
            'uniqueVisitors',
            'bounceRate'
        ));
    }
}