<?php
function formatToText($number)
{
    if ($number >= 1000000000) {
        return number_format($number / 1000000000, 2, ',', '.') . ' tỷ';
    } elseif ($number >= 1000000) {
        return number_format($number / 1000000, 2, ',', '.') . ' triệu';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 2, ',', '.') . ' nghìn';
    } else {
        return number_format($number, 0, ',', '.') . ' đồng';
    }
}

function growthRate($current, $previous)
{
    $growthRate = $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;

   return $data['comparison'] = [
        'current_week' => $current,
        'last_week' => $previous,
        'growth_rate' => round($growthRate, 2), // Ví dụ: +15.5% hoặc -10.2%
        'difference' => $current - $current, // Chênh lệch số đơn
        'trend' => $growthRate > 0 ? 'up' : ($growthRate < 0 ? 'down' : 'ổn định')
    ];
}
