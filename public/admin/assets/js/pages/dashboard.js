/**
* Theme: Larkon - Responsive Bootstrap 5 Admin Dashboard
* Author: Techzaa
* Module/App: Dashboard
*/

//
// Conversions
// 
async function callApiChart(timeRange) {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/chart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ time: timeRange })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();
        
        // Xử lý dữ liệu và cập nhật biểu đồ
        // const chartData = processChartData(result);
        // updateChart(chartData);
        
        return result;
        
    } catch (error) {
        console.error('Error calling API chart:', error);
        return null;
    }
}

// Khởi tạo charts với dữ liệu từ API
async function initializeCharts() {
    const res = await callApiChart('all');
    console.log('API Response:', res);
    
    // Xử lý dữ liệu từ API
    if (res && res.length > 0) {
        // Tính toán conversion rate từ dữ liệu thực
        const conversionRate = calculateConversionRate(res);
        updateConversionsChart(conversionRate);
        
        // Cập nhật Performance Chart với dữ liệu thực
        updatePerformanceChart(res);
    } else {
        // Fallback với dữ liệu mặc định nếu API không trả về data
        updateConversionsChart(65.2);
        renderPerformanceChart([]);
    }
}

// Hàm helper để tính conversion rate từ dữ liệu thực
function calculateConversionRate(data) {
    if (data.length >= 2) {
        // Sắp xếp theo ngày để so sánh đúng
        const sortedData = data.sort((a, b) => new Date(b.date) - new Date(a.date));
        const current = parseFloat(sortedData[0].total_price);
        const previous = parseFloat(sortedData[1].total_price);
        
        if (previous > 0) {
            const rate = ((current - previous) / previous * 100);
            return Math.abs(rate); // Trả về giá trị tuyệt đối để hiển thị % dương
        }
    }
    
    // Nếu chỉ có 1 record, tính % dựa trên target hoặc baseline
    if (data.length === 1) {
        const current = parseFloat(data[0].total_price);
        // Giả sử target là 10M, tính % đạt được
        const target = 10000000;
        return ((current / target) * 100).toFixed(1);
    }
    
    return 0; // Không có dữ liệu
}

// Hàm cập nhật Conversions Chart
function updateConversionsChart(conversionRate) {
    var options = {
        chart: {
            height: 292,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '14px',
                        color: "undefined",
                        offsetY: 100
                    },
                    value: {
                        offsetY: 55,
                        fontSize: '20px',
                        color: undefined,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                },
                track: {
                    background: "rgba(170,184,197, 0.2)",
                    margin: 0
                },
            }
        },
        fill: {
            gradient: {
                enabled: true,
                shade: 'dark',
                shadeIntensity: 0.2,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4
        },
        colors: ["#ff6c2f", "#22c55e"],
        series: [parseFloat(conversionRate)], // Sử dụng dữ liệu từ API
        labels: ['Returning Customer'],
        responsive: [{
            breakpoint: 380,
            options: {
                chart: {
                    height: 180
                }
            }
        }],
        grid: {
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#conversions"),
        options
    );

    chart.render();
}

// Performance Chart function - cập nhật với dữ liệu từ API
function updatePerformanceChart(apiData) {
    // Xử lý dữ liệu từ API thành format cho chart
    let chartData = processApiDataForChart(apiData);
    
    var options = {
        series: [{
            name: "Doanh thu (M VND)",
            type: "bar",
            data: chartData.revenues,
            yAxisIndex: 0,
        },
        {
            name: "Tỷ lệ tăng trưởng (%)",
            type: "line", 
            data: chartData.growthRates,
            yAxisIndex: 1,
        }],
        chart: {
            height: 400,
            type: "line",
            toolbar: {
                show: false,
            },
        },
        stroke: {
            width: [0, 3],
            curve: 'smooth'
        },
        fill: {
            opacity: [0.8, 1],
            type: ['solid', 'solid'],
        },
        markers: {
            size: [0, 6],
            strokeWidth: 2,
            hover: {
                size: 8,
            },
        },
        xaxis: {
            categories: chartData.categories,
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: [
            {
                title: {
                    text: 'Doanh thu (Triệu VND)',
                    style: {
                        color: '#ff6c2f',
                    }
                },
                labels: {
                    style: {
                        colors: '#ff6c2f',
                    },
                    formatter: function (val) {
                        return val.toLocaleString() + 'M';
                    }
                },
                min: 0,
            },
            {
                opposite: true,
                title: {
                    text: 'Tỷ lệ tăng trưởng (%)',
                    style: {
                        color: '#22c55e',
                    }
                },
                labels: {
                    style: {
                        colors: '#22c55e',
                    },
                    formatter: function (val) {
                        return val.toFixed(1) + '%';
                    }
                },
            }
        ],
        grid: {
            show: true,
            strokeDashArray: 3,
            borderColor: '#f0f0f0',
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 0,
                right: 30,
                bottom: 0,
                left: 10,
            },
        },
        legend: {
            show: true,
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 0,
            offsetY: 0,
            markers: {
                width: 12,
                height: 12,
                radius: 6,
            },
            itemMargin: {
                horizontal: 20,
                vertical: 5,
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "50%",
                borderRadius: 4,
            },
        },
        colors: ["#ff6c2f", "#22c55e"],
        tooltip: {
            shared: true,
            intersect: false,
            y: [
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toLocaleString() + " Triệu VND";
                        }
                        return y;
                    },
                },
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(1) + "%";
                        }
                        return y;
                    },
                }
            ],
        },
        dataLabels: {
            enabled: true,
            enabledOnSeries: [1], // Chỉ hiện label cho growth rate
            formatter: function (val, opts) {
                return val.toFixed(1) + '%';
            },
            style: {
                colors: ['#22c55e']
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#dash-performance-chart"),
        options
    );

    chart.render();
}

// Hàm xử lý dữ liệu API thành format cho Performance Chart
function processApiDataForChart(apiData) {
    if (!apiData || apiData.length === 0) {
        return {
            categories: ["Không có dữ liệu"],
            revenues: [0],
            growthRates: [0]
        };
    }

    // Sắp xếp dữ liệu theo ngày
    const sortedData = apiData.sort((a, b) => new Date(a.date) - new Date(b.date));
    
    const categories = [];
    const revenues = [];
    const growthRates = [];
    
    sortedData.forEach((item, index) => {
        // Format tháng từ date
        const date = new Date(item.date);
        const monthYear = `Tháng ${date.getMonth() + 1}/${date.getFullYear()}`;
        categories.push(monthYear);
        
        // Revenue - giữ nguyên giá trị VND, chỉ chia cho 1000 để dễ đọc (nghìn VND)
        const revenue = parseFloat(item.total_price) / 1000000;
        revenues.push(revenue);
        
        // Tính growth rate so với tháng trước
        if (index > 0) {
            const currentRevenue = parseFloat(item.total_price);
            const prevRevenue = parseFloat(sortedData[index - 1].total_price);
            const growthRate = prevRevenue > 0 ? ((currentRevenue - prevRevenue) / prevRevenue * 100) : 0;
            growthRates.push(Number(growthRate.toFixed(1)));
        } else {
            growthRates.push(0); // Tháng đầu tiên không có dữ liệu so sánh
        }
    });
    
    return {
        categories,
        revenues,
        growthRates
    };
}

class VectorMap {
    initWorldMapMarker() {
        const map = new jsVectorMap({
            map: 'world',
            selector: '#world-map-markers',
            zoomOnScroll: true,
            zoomButtons: true,
            markersSelectable: true,
            // Zoom to và focus vào Việt Nam
            focusOn: {
                coords: [16.0, 106.0], // Tọa độ trung tâm Việt Nam
                scale: 8 // Zoom level cao để phóng to
            },
            // Chỉ giữ lại 5 chi nhánh chính
            markers: [
                { name: "Hà Nội", coords: [21.0285, 105.8542] },
                { name: "Thành phố Hồ Chí Minh", coords: [10.8231, 106.6297] },
                { name: "Đà Nẵng", coords: [16.0544, 108.2022] },
                { name: "Hải Phòng", coords: [20.8449, 106.6881] },
                { name: "Cần Thơ", coords: [10.0452, 105.7469] }
            ],
            markerStyle: {
                initial: { 
                    fill: "#7f56da",
                    stroke: "#ffffff",
                    strokeWidth: 2,
                    r: 8 // Tăng kích thước marker
                },
                selected: { 
                    fill: "#22c55e",
                    stroke: "#ffffff",
                    strokeWidth: 3,
                    r: 10
                }
            },
            labels: {
                markers: {
                    render: marker => marker.name,
                    offsets: function(index) {
                        return [0, -20]; // Đẩy label lên trên marker
                    }
                }
            },
            regionStyle: {
                initial: {
                    fill: 'rgba(169,183,197, 0.3)',
                    fillOpacity: 1,
                    stroke: '#ffffff',
                    strokeWidth: 1
                },
                hover: {
                    fill: 'rgba(169,183,197, 0.5)'
                }
            },
            // Tùy chỉnh thêm để map focus vào Việt Nam
            onLoaded: function(map) {
                // Có thể thêm logic sau khi map load xong
                console.log('Map loaded successfully');
            }
        });
        
        return map;
    }
    
    init() {
        this.map = this.initWorldMapMarker();
        return this.map;
    }
}

// Khởi tạo khi DOM ready
document.addEventListener('DOMContentLoaded', function (e) {
    // Khởi tạo charts với dữ liệu từ API
    if (typeof initializeCharts === 'function') {
        initializeCharts();
    }
    
    // Khởi tạo map
    const vectorMap = new VectorMap().init();
    
    // Lưu reference để có thể sử dụng sau này
    window.vectorMapInstance = vectorMap;
});

// Hàm để refresh charts với time range khác (có thể gọi từ UI)
async function refreshChartsWithTimeRange(timeRange) {
    if (typeof callApiChart !== 'function') {
        console.warn('callApiChart function not found');
        return;
    }
    
    const res = await callApiChart(timeRange);
    if (res && res.length > 0) {
        const conversionRate = calculateConversionRate(res);
        
        // Xóa chart cũ trước khi render chart mới
        const conversionElement = document.querySelector("#conversions");
        const performanceElement = document.querySelector("#dash-performance-chart");
        
        if (conversionElement) {
            conversionElement.innerHTML = '';
        }
        if (performanceElement) {
            performanceElement.innerHTML = '';
        }
        
        // Render lại charts với dữ liệu mới
        if (typeof updateConversionsChart === 'function') {
            updateConversionsChart(conversionRate);
        }
        if (typeof updatePerformanceChart === 'function') {
            updatePerformanceChart(res);
        }
    }
}

// Hàm tiện ích để zoom đến một marker cụ thể
function zoomToMarker(markerName) {
    if (window.vectorMapInstance) {
        const markers = window.vectorMapInstance.markers;
        const marker = Object.values(markers).find(m => m.config.name === markerName);
        if (marker) {
            window.vectorMapInstance.setFocus({
                coords: marker.config.coords,
                scale: 12
            });
        }
    }
}