<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        // Lấy dữ liệu từ request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $groupBy = $request->input('group_by', 'day'); // Mặc định là theo ngày

        // Khởi tạo truy vấn cho các đơn hàng
        $orderQuery = Order::query();
        
        // Nếu có chọn ngày bắt đầu và ngày kết thúc
        if ($startDate && $endDate) {
            $orderQuery->whereBetween('updated_at', [$startDate, $endDate]);
        } elseif ($groupBy == 'month') {
            // Nếu không chọn thời gian và nhóm theo tháng, lấy tất cả tháng trong năm hiện tại
            $startDate = now()->startOfYear()->toDateString(); // Ngày đầu năm hiện tại
            $endDate = now()->endOfYear()->toDateString(); // Ngày cuối năm hiện tại
            $orderQuery->whereBetween('updated_at', [$startDate, $endDate]);
        } else {
            // Nếu không chọn thời gian và nhóm theo ngày, lấy dữ liệu của tháng hiện tại
            $startDate = now()->startOfMonth()->toDateString(); // Ngày đầu tháng hiện tại
            $endDate = now()->endOfMonth()->toDateString(); // Ngày cuối tháng hiện tại
            $orderQuery->whereBetween('updated_at', [$startDate, $endDate]);
        }

        // Tính tổng số đơn hàng
        $totalOrders = $orderQuery->count();

        // Khởi tạo truy vấn cho các đơn hàng đã thanh toán (status = 'completed')
        $completedOrderQuery = $orderQuery->clone()->where('status', 'completed');
        
        // Tổng doanh thu thực thu trong khoảng thời gian chọn
        $totalRevenue = $completedOrderQuery->sum('total_amount');

        // Tính tổng số đơn hàng đã thanh toán
        $totalCompletedOrders = $completedOrderQuery->count();

        // Tính tổng giá trị của tất cả đơn hàng
        $totalOrderValue = $orderQuery->sum('total_amount');

        // Tổng giá trị đơn hàng chưa thanh toán
        $totalPending = $orderQuery->where('status', '!=', 'completed')->sum('total_amount');

        // Nhóm theo ngày hoặc tháng cho dữ liệu biểu đồ
        if ($groupBy == 'month') {
            // Lấy tất cả các tháng trong năm hiện tại
            $months = collect();
            for ($i = 1; $i <= 12; $i++) {
                $months->push(Carbon::create(null, $i, 1)->format('Y-m'));
            }

            // Truy vấn doanh thu và số đơn đã thanh toán theo tháng
            $data = $completedOrderQuery->select(DB::raw('DATE_FORMAT(updated_at, "%Y-%m") as formatted_date'), DB::raw('SUM(total_amount) as revenue'), DB::raw('COUNT(*) as total_completed_orders'))
                ->groupBy(DB::raw('DATE_FORMAT(updated_at, "%Y-%m")')) // Nhóm theo tháng
                ->get();

            // Kết hợp doanh thu với tháng để đảm bảo có doanh thu cho tất cả các tháng
            $revenueData = [];
            foreach ($months as $month) {
                $revenueData[$month] = [
                    'revenue' => 0,
                    'total_completed_orders' => 0,
                ]; // Khởi tạo doanh thu và số đơn đã thanh toán bằng 0 cho mỗi tháng
            }

            foreach ($data as $item) {
                $revenueData[$item->formatted_date] = [
                    'revenue' => $item->revenue,
                    'total_completed_orders' => $item->total_completed_orders,
                ]; // Gán doanh thu và số đơn đã thanh toán cho tháng tương ứng
            }

            // Chuyển đổi dữ liệu doanh thu về định dạng cho biểu đồ
            $data = collect($revenueData)->map(function ($values, $month) {
                return [
                    'formatted_date' => $month,
                    'revenue' => $values['revenue'],
                    'total_completed_orders' => $values['total_completed_orders'],
                ];
            });
        } else {
            // Lấy tất cả các ngày trong khoảng thời gian đã chọn
            $dates = collect();
            $dateRange = Carbon::parse($startDate)->daysUntil(Carbon::parse($endDate));
            foreach ($dateRange as $date) {
                $dates->push($date->toDateString());
            }

            // Truy vấn doanh thu và số đơn đã thanh toán theo từng ngày
            $data = $completedOrderQuery->select(DB::raw('DATE(updated_at) as formatted_date'), DB::raw('SUM(total_amount) as revenue'), DB::raw('COUNT(*) as total_completed_orders'))
                ->groupBy(DB::raw('DATE(updated_at)')) // Nhóm theo ngày
                ->get();

            // Kết hợp doanh thu với ngày để đảm bảo có doanh thu cho tất cả các ngày
            $revenueData = [];
            foreach ($dates as $date) {
                $revenueData[$date] = [
                    'revenue' => 0,
                    'total_completed_orders' => 0,
                ]; // Khởi tạo doanh thu và số đơn đã thanh toán bằng 0 cho mỗi ngày
            }

            foreach ($data as $item) {
                $revenueData[$item->formatted_date] = [
                    'revenue' => $item->revenue,
                    'total_completed_orders' => $item->total_completed_orders,
                ]; // Gán doanh thu và số đơn đã thanh toán cho ngày tương ứng
            }

            // Chuyển đổi dữ liệu doanh thu về định dạng cho biểu đồ
            $data = collect($revenueData)->map(function ($values, $date) {
                return [
                    'formatted_date' => $date,
                    'revenue' => $values['revenue'],
                    'total_completed_orders' => $values['total_completed_orders'],
                ];
            });
        }

        // Lấy dữ liệu cho biểu đồ
        $dates = $data->pluck('formatted_date')->toArray();
        $revenues = $data->pluck('revenue')->toArray();
        $completedOrdersCount = $data->pluck('total_completed_orders')->toArray();

        // Lấy sản phẩm bán chạy
        $topProducts = OrderItem::select('product_id', 
            DB::raw('SUM(quantity) as total_quantity'), 
            DB::raw('SUM(price * quantity) as total_revenue'))
            ->whereHas('order', function ($query) {
                $query->where('status', 'completed');
            })
            ->groupBy('product_id')
            ->orderBy('total_revenue', 'desc')
            ->with('product')
            ->get();

        // Tính chi phí và lợi nhuận
        $totalCost = $topProducts->sum('cost'); // Giả sử có một trường 'cost' trong OrderItem
        $profit = $totalRevenue - $totalCost;

        return view('admin.statistics.index', compact('totalOrders', 'totalOrderValue', 'totalRevenue', 'totalPending', 'dates', 'revenues', 'totalCompletedOrders', 'topProducts', 'profit'));
    }
}
